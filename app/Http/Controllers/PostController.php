<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->simplePaginate(4);

        return view('frontend.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.single', compact('post'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('frontend.categories', compact('categories'));
    }
}
