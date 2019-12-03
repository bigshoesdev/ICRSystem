<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller {
    public function index()
    {
        $user = Auth::user();
        return view('exchange.index',compact('user'));
    }
}