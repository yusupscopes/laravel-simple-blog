<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;

class PostController extends Controller
{
    protected $limit = 4;

    public function index()
    {
        $posts = Post::with('author')->latest()->simplePaginate($this->limit);

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

    public function category(Category $category)
    {
        $categoryName = $category->title;

        $posts = $category->posts()->with('author')->latest()->simplePaginate($this->limit);

        return view('frontend.index', compact('posts', 'categoryName'));
    }

    public function author(User $author)
    {
        $authorName = $author->name;

        $posts = $author->posts()->with('category')->latest()->simplePaginate($this->limit);

        return view('frontend.index', compact('posts', 'authorName'));
    }
}
