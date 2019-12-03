<?php
namespace App\Http\Controllers\Admin;

use App\Kyc;
use App\Kyc2;
use App\Notifications\KYC2VerifyReject;
use App\Notifications\KYC2VerifySuccess;
use App\Notifications\KYCVerifyReject;
use App\Notifications\KYCVerifySuccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KYCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function kyc()
    {
        $kycs = Kyc::whereStatus(0)->paginate(15);
        return view('admin.kyc.kyc',compact('kycs'));
    }

    public function kyc2()
    {
        $kycs = Kyc2::whereStatus(0)->paginate(15);
        return view('admin.kyc.kyc2',compact('kycs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verify = Kyc::find($id);
        return view('admin.kyc.show',compact('verify'));
    }

    public function show2($id)
    {
        $verify = Kyc2::find($id);
        return view('admin.kyc.show2',compact('verify'));
    }

    public function KycAccept($id)
    {
        $kyc = Kyc::find($id);
        $kyc->status = 1;
        $kyc->save();

        $user = $kyc->user;

//        $user->notify(new KYCVerifySuccess($user));

        Session::flash('message', trans('general/message.user_success_verify'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.verify_success'));

        return redirect()->route('admin.kyc');

    }
    public function KycReject($id)
    {
        $kyc = Kyc::find($id);
        $kyc->delete();

        $user = $kyc->user;

//        $user->notify(new KYCVerifyReject($user));

        Session::flash('message', trans('general/message.user_reject_verify'));
        Session::flash('type', 'warning');
        Session::flash('title', trans('general/message.reject_success'));

        return redirect()->route('admin.kyc');
    }


    public function Kyc2Accept($id)
    {
        $kyc = Kyc2::find($id);
        $kyc->status = 1;
        $kyc->save();

        $user = $kyc->user;

//        $user->notify(new KYC2VerifySuccess($user));

        Session::flash('message', trans('general/message.user_success_verify'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.verify_success'));

        return redirect()->route('admin.kyc2');
    }

    public function Kyc2Reject($id)
    {
        $kyc = Kyc2::find($id);
        $kyc->delete();

        $user = $kyc->user;

//        $user->notify(new KYC2VerifyReject($user));

        Session::flash('message', trans('general/message.user_reject_verify'));
        Session::flash('type', 'warning');
        Session::flash('title', trans('general/message.reject_success'));

        return redirect()->route('admin.kyc2');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
