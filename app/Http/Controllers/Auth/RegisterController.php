<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserReferred;
use App\Profile;
use App\Reflink;
use App\Settings;
use App\User;
use App\Notifications\AccountActiveSuccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $settings = Settings::first();

        $user = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin' => 0,
            'active' => 0,
            'membership_id' => 1,
            'membership_started' => date('Y-m-d'),
            'membership_expired' => '2020-12-31',
            'token' => str_random(25),
            'google2fa_enabled' => 0,
        ]);


        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/default.jpg',
            'main_balance' => 0,
        ]);

        Reflink::create([
            'user_id' => $user->id,
            'link' => str_random(4) . $user->id . str_random(4),
        ]);

//        $user->sendVerificationEmail();

        event(new UserReferred(request()->cookie('ref'), $user));

        Session::flash('message', trans('auth/message.account_create_check_email'));
        Session::flash('type', 'warning');
        Session::flash('title', trans('auth/message.email_verify_required'));

        return $user;
    }

    public function verifyLogout()
    {
        session()->flash('message', trans('auth/message.verify_logout'));
        Auth::logout();

        return redirect()->route('login');
    }

    public function verify($token)
    {
        $user = User::where('token', $token)->firstOrfail();
        $user->token = null;
        $user->active = 1;
        $user->save();

//        $user->notify(new AccountActiveSuccess($user));

        Session::flash('message', trans('auth/message.email_address_success_verified'));
        Session::flash('type', 'success');
        Session::flash('title', trans('auth/message.verify_success'));

        return redirect()->route('login');
    }
}
