<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $related = Post::published()->related($post)->get();

        return view('posts.show', compact('post', 'related'));
    }
}
