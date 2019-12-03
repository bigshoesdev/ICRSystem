<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\SupportAccept;
use App\Support;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $supports = Support::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(15);

        return view('support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'subject'=> 'required|max:200',
            'body' => 'required|max:4000',
        ];

        $niceNames = [
            'subject' => 'Subject',
            'body' => 'Message',
        ];

        $this->validate($request, $rules, [], $niceNames);

        $user = Auth::user();

        $support = Support::create([
            'ticket' => str_random(12),
            'subject' => $request->subject,
            'message' => $request->body,
            'user_id' => $user->id,
            'status' => 1
        ]);

//        $user->notify(new SupportAccept($user));

        Session::flash('message',  trans('general/message.support_ticket_create_success') );
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.create_success') );

        return redirect()->route('supports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $user = Auth::user();

        $support = Support::where('ticket',$ticket)->first();
        $discussions = Discussion::whereSupport_id($support->id)->get();

        return view('support.show',compact('support','discussions','user'));
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
    public function close($id)
    {
        $support = Support::find($id);
        $support->status = 0;
        $support->save();

        Session::flash('message',  trans('general/message.support_ticket_close_success') );
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.close_success') );

        return redirect()->route('supports');
    }

    public function message(Request $request, $ticket)
    {
        $this->validate($request, [
            'body' => 'required|max:4000',
        ]);

        $support = Support::where('ticket', $ticket)->first();
        $support -> status = 3;
        $support->save();

        $user = Auth::user();

        $discussion = Discussion::create([
            'support_id' => $support->id,
            'message' => $request->body,
            'user_id' => $user->id,
            'type'=>0
        ]);

        Session::flash('message',  trans('general/message.your_reply_submit') );
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.submit_success') );

        return redirect()->route('supports');
    }
}
