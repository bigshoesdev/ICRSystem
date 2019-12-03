<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\AdminCreateUser;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        $users = User::latest()->search($s)->paginate(10);

        return view('admin.user.index', compact('users', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin' => 0,
            'active' => 0,
            'membership_id' => 1,
            'membership_started' => date('Y-m-d'),
            'membership_expired' => '2020-12-31',
            'token' => str_random(25),
            'google2fa_enabled' => 0,
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/default.jpg'
        ]);

        $data = (object) array(
            "email" => $request->email,
            "password" => $request->password,
            "token" => $user->token,
        );

//        $user->notify(new AdminCreateUser($data));

        Session::flash('message', trans('general/message.user_success_update'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.create_success'));

        return redirect()->route('admin.user.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        $user = User::find($id);

        if ($request->hasFile('avatar')) {
            $this->validate($request, [
                'avatar' => 'required|image'
            ]);

            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->profile->main_balance = $request->main_balance;
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

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Session::flash('message', trans('general/message.user_success_update'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.update_success'));

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('message', trans('general/message.user_success_delete'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.delete_success'));

        return redirect()->route('admin.user.index');
    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        session()->flash('message', 'The User Has Been Successfully Get Admin Permission.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission Granted');

        return redirect()->back();

    }

    public function adminRemove($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        session()->flash('message', 'The User Has Been Successfully Removed Admin Permission.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission Removed');

        return redirect()->back();


    }

}
