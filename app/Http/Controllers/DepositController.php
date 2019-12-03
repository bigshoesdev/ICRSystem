<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DepositController extends Controller {
    public function index()
    {
        $user = Auth::user();
        return view('deposit.index',compact('user'));
    }
}