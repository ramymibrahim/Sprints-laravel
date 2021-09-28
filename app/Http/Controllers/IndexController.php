<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('index')->with('posts', $posts);
    }
}
