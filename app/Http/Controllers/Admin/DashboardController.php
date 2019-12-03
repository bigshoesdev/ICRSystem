<?php
namespace App\Http\Controllers\Admin;

use App\Kyc;
use App\Kyc2;
use App\Profile;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $deposit_notify = array(); //Deposit::whereStatus(0)->get();
        $withdraw_notify = array(); // Withdraw::whereStatus(0)->get();
        $kyc_notify = Kyc::whereStatus(0)->get();
        $kyc2_notify = Kyc2::whereStatus(0)->get();

        $earn = Profile::select('main_balance')->sum('main_balance');

        $stakings = array();  // Staking::where('end', '>', Carbon::now())->sum('amount');
        $pendingDeposit = array(); //Deposit::whereStatus(0)->sum('amount');
        $pendingWithdraw = array(); // Withdraw::whereStatus(0)->sum('amount');

        return view('admin.dashboard.index',compact('deposit_notify','withdraw_notify',
            'kyc_notify','kyc2_notify','earn','invest','pendingWithdraw', 'pendingDeposit', 'stakings'));
    }
}
