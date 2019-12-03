<?php

namespace App\Http\Controllers;

use App\Kyc;
use App\Kyc2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Google2FA;
use App\Notifications\KYC2VerifyAccept;
use App\Notifications\KYCVerifyAccept;
use App\Http\Requests\OTPRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $identity = Kyc::whereUser_id($user->id)->get();
        $address = Kyc2::whereUser_id($user->id)->get();
        $result1 = Kyc::whereUser_id($user->id)->first();
        $result2 = Kyc2::whereUser_id($user->id)->first();
        $google2fa = array();

        if (empty($user->google2fa_secret) || !$user->google2fa_enabled) {
            $user->google2fa_secret = app('pragmarx.google2fa')->generateSecretKey();
            $user->save();
        }
        $google2fa['secret'] = $user->google2fa_secret;
        $google2fa['image'] = Google2FA::getQRCodeInline(config('app.name'), $user->email, $google2fa['secret'], 200);

        return view('profile.index', compact('user', 'identity', 'address', 'result1', 'result2', 'google2fa'));
    }

    public function kyc()
    {
        $user = Auth::user();
        $result1 = Kyc::whereUser_id($user->id)->first();
        $result2 = Kyc2::whereUser_id($user->id)->first();

        return view('profile.kyc', compact('user', 'result1', 'result2'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'occupation' => 'max:30',
            'mobile' => 'max:16',
            'address' => 'max:50',
            'city' => 'max:30',
            'state' => 'max:30',
            'postcode' => 'max:20'
        ]);

        if (!Hash::check($request->get('current_password'), $user->password)) {
            Session::flash('message', trans('auth/message.current_pass_not_match'));
            Session::flash('type', "error");
            Session::flash('title', trans('auth/message.pass_not_match'));
            return redirect()->back();
        }
        if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
            Session::flash('message', trans('auth/message.new_pass_not_same'));
            Session::flash('type', "warning");
            Session::flash('title', trans('auth/message.pass_same'));
            return redirect()->back();
        }
        if ($request->hasFile('avatar')) {
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
            $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->occupation = $request->occupation;
        $user->profile->mobile = $request->mobile;
        $user->profile->address = $request->address;
        $user->profile->address2 = $request->address2;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->postcode = $request->postcode;
        $user->profile->country = $request->country;
        $user->profile->facebook = $request->facebook;
        $user->profile->about = $request->about;
        $user->save();
        $user->profile->save();
        if ($request->password != null) {
            $this->validate($request, [
                'password' => 'required|min:6|confirmed'
            ]);
            $user->password = bcrypt($request->password);
            $user->save();
        }
        Session::flash('message', trans('general/message.profile_success_update'));
        Session::flash('type','success');
        Session::flash('title', trans('general/message.update_success'));
        return redirect()->back();
    }

    public function kyc1Submit(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name' => 'required|max:25',
            'front' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
            'number' => 'required|max:50',
            'dob' => 'required|date',
        ];

        $niceNames = [
            'name' => 'Document Type',
            'front' => 'Front Page',
            'number' => 'Number',
            'dob' => 'Date of Birth'
        ];

        $this->validate($request, $rules, [], $niceNames);

        if ($request->hasFile('back')) {
            $this->validate($request, [
                'back' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072'
            ]);

            $back = $request->back;
            $back_new_name = time() . $back->getClientOriginalName();
            $back->move('uploads/verifications', $back_new_name);
            $front = $request->front;
            $front_new_name = time() . $front->getClientOriginalName();
            $front->move('uploads/verifications', $front_new_name);

            $kyc = Kyc::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'number' => $request->number,
                'back' => 'uploads/verifications/' . $back_new_name,
                'front' => 'uploads/verifications/' . $front_new_name,
                'dob' => $request->dob,
                'status' => 0,
            ]);

//            $user->notify(new KYCVerifyAccept($user));

            Session::flash('message', trans('general/message.verify_request_submit') );
            Session::flash('type', 'success');
            Session::flash('title',trans('general/message.request_success'));

            return redirect()->route('profile.kyc');
        }

        $front = $request->front;
        $front_new_name = time() . $front->getClientOriginalName();
        $front->move('uploads/verifications', $front_new_name);

        $kyc = Kyc::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'number' => $request->number,
            'back' => 'assets/img/dashboard/image_placeholder.jpg',
            'front' => 'uploads/verifications/' . $front_new_name,
            'dob' => $request->dob,
            'status' => 0,
        ]);

//        $user->notify(new KYCVerifyAccept($user));

        Session::flash('message', trans('general/message.verify_request_submit') );
        Session::flash('type', 'success');
        Session::flash('title',trans('general/message.request_success'));

        return redirect()->route('profile.kyc');
    }

    public function kyc2Submit(Request $request)
    {
        $user= Auth::user();

        $rules = [
            'name'=> 'required|max:25',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
        ];

        $niceNames = [
            'name' => 'Document Type',
            'photo' => 'Document',
        ];

        $this->validate($request, $rules, [], $niceNames);
        $photo = $request->photo;
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('uploads/verifications', $photo_new_name);

        $kyc2 = Kyc2::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'photo' => 'uploads/verifications/' . $photo_new_name,
            'status' => 0,
        ]);

//        $user->notify(new KYC2VerifyAccept($user));

        Session::flash('message', trans('general/message.verify_request_submit') );
        Session::flash('type', 'success');
        Session::flash('title',trans('general/message.request_success'));

        return redirect()->route('profile.kyc');
    }

    public function enableTwoFactor(OTPRequest $request)
    {
        $user = Auth::user();
        $user->google2fa_enabled = true;
        $user->save();

        Session::flash('message', trans('general/message.google_auth_enable'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.enable_auth'));

        return redirect()->route('profile');
    }

    public function disableTwoFactor(OTPRequest $request)
    {
        $user = Auth::user();

        $user->google2fa_enabled = false;
        $user->google2fa_secret = null;
        $user->save();

        Session::flash('message', trans('general/message.google_auth_disable'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.disable_auth'));

        return redirect()->route('profile');
    }

    public function renew2FASecretCode(OTPRequest $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $user = Auth::user();
        $user->google2fa_secret = $google2fa->generateSecretKey();
        $user->save();

        Session::flash('message', trans('general/message.secret_code_renew') );
        Session::flash('type', 'success');
        Session::flash('title',trans('general/message.renew_secret_code') );

        return redirect()->route('profile');
    }

}

