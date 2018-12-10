<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->simplePaginate(4);

        return view('frontend.index', compact('posts'));
    }
}
