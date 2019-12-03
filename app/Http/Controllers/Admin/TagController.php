<?php
namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
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
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
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
        $this->validate($request, [
            'tag'=> 'required'
        ]);

        Tag::create([
            'tag' => $request->tag
        ]);

        Session::flash('message', trans('general/message.tag_create_success'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.create_success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.tag.edit', compact('tag'));
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
        $this->validate($request, [
            'tag'=> 'required'
        ]);

        $tag = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();

        Session::flash('message', trans('general/message.tag_create_update'));
        Session::flash('type', 'success');
        Session::flash('title',  trans('general/message.update_success'));

        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        foreach ($tag->posts as $post){
            $post->tags()->detach([$id]);
        }

        $tag->delete();

        Session::flash('message', trans('general/message.tag_create_delete'));
        Session::flash('type', 'success');
        Session::flash('title',  trans('general/message.delete_success'));

        return redirect()->route('admin.tag.index');
    }
}
