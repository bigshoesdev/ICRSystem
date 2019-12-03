<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Settings;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $settings = Settings::first();
        $withdraw = array();// Withdraw::whereUser_id($user->id)->whereStatus(1)->select('amount')->sum('amount');;

        $posts = array(); //Post::latest()->take(6)->get();

        $identity = array(); //Kyc::whereUser_id($user->id)->get();

        $address = array(); //Kyc2::whereUser_id($user->id)->get();

        return view('dashboard.index', compact('user', 'identity', 'address', 'posts', 'withdraw', 'settings'));

    }
}