<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(3);

        return view('news.index', compact('posts'));
    }

    public function newsView($slug) {
        $post = Post::where('slug',$slug)->first();
        $user = User::whereAdmin(1)->first();

        return view('news.view', compact('post','user'));
    }
}