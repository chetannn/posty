<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create([
            'title' => request()->get('title'),
            'body' => request()->get('body'),
            'user_id' => auth()->id()
        ]);

        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title' => request()->get('title'),
            'body' => request()->get('body'),
        ]);

        return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return back();
    }
}
