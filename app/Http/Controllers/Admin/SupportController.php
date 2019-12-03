<?php

namespace App\Http\Controllers\Admin;

use App\Discussion;
use App\Notifications\UserSupportReply;
use App\Support;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $supports = Support::whereStatus(0)->orderBy('created_at', 'asc')->paginate(20);
        return view('admin.support.index', compact('supports'));
    }

    public function open()
    {
        $open_supports = Support::wherein('status', [1, 2, 3])->orderBy('id', 'desc')->paginate(15);

        return view('admin.support.open', compact('open_supports'));
    }

    public function show($ticket)
    {
        $user = Auth::user();
        $support = Support::where('ticket', $ticket)->first();
        $discussions = Discussion::whereSupport_id($support->id)->get();

        return view('admin.support.show', compact('support', 'user', 'discussions'));
    }

    public function close($id)
    {
        $support = Support::find($id);
        $support->status = 0;
        $support->save();

        Session::flash('message', trans('general/message.user_support_ticket_close_success'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.close_success'));

        return redirect()->route('admin.support.open');
    }

    public function store(Request $request, $ticket)
    {
        $this->validate($request, [
            'body' => 'required|max:4000',
        ]);

        $support = Support::where('ticket', $ticket)->first();
        $support->status = 2;
        $support->save();

        $user1 = Auth::user();

        $discussion = Discussion::create([
            'support_id' => $support->id,
            'message' => $request->body,
            'user_id' => $user1->id,
            'type' => 1
        ]);

        $user = $support->user;

//        $user->notify(new UserSupportReply($user));

        Session::flash('message', trans('general/message.sup_msg_submit_success'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.submit_success'));

        return redirect()->route('admin.support.open');
    }
}
