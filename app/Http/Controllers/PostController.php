<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

    public function category(Category $category)
    {
        $posts = Post::published()->whereCategoryId($category->id)->paginate(6);
        return view('posts.category', compact('category', 'posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->published()->paginate(6);
        // $posts = Post::published()->whereCategoryId($category->id)->paginate(6);
        return view('posts.tag', compact('tag', 'posts'));
    }
}
