<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserLoginNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {

        $user = Auth::user();

        if ($user->active == 0) {
            Auth::logout();
            return '/verify/logout';
        } else {
            if ($user->google2fa_enabled) {
                Auth::logout();

                session()->put('url', null);
                session()->put('2fa:user:id', $user->id);

                return '/2fa/validate';
            }

//             $user->notify(new UserLoginNotify($user));

            return '/dashboard';
        }
    }


    public function getValidateToken()
    {
        if (session()->get('2fa:user:id')) {
            return view('auth.2fa');
        }

        return redirect()->route('login');
    }

    public function postValidateToken(ValidateSecretRequest $request)
    {
        $userId = $request->session()->pull('2fa:user:id');
        $key = $userId . ':' . $request->totp;

        $user = User::where('id', $userId)->first();

        Auth::login($user, false);

        return redirect()->route('dashboard');
    }
}
