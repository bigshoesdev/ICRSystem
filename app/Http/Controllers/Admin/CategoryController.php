<?php
namespace App\Http\Controllers\Admin;

use App\Category;;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('message', trans('general/message.blog_category_create_success'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.create_success'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
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
            'name'=> 'required|max:200'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        session()->flash('message', trans('general/message.blog_category_update_success'));
        Session::flash('type', 'success');
        Session::flash('title',  trans('general/message.update_success'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        foreach ($category->posts as $post){
            $post->delete();
        }

        $category->delete();

        session()->flash('message', trans('general/message.blog_category_delete_success'));
        Session::flash('type', 'success');
        Session::flash('title', trans('general/message.delete_success'));

        return redirect()->route('admin.category.index');
    }
}
