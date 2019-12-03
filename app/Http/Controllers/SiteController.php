<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function home(){
        return view('home');
    }
}