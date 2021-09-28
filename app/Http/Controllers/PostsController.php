<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255', 'content' => 'required'], $request->all());
        $data = $request->all();
        $data['image'] = $request->file('image_file')->store('images',['disk'=>'public']);
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        return redirect('posts');
    }

    function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with(['post' => $post, 'categories' => Category::all()]);
    }

    function update($id, Request $request)
    {
        $request->validate(['title' => 'required|max:255', 'content' => 'required'], $request->all());
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        $post->save();
        return redirect('posts');
    }

    function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
    }
}
//CRUD operations