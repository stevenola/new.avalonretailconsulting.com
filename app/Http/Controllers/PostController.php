<?php

namespace App\Http\Controllers;

use App\Post;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::all();
        // Only shows posts of the logged in user:
        $posts = auth()->user()->posts()->paginate(5);


        return view('admin.posts.index', ['posts' => $posts]);
    }


    public function show(Post $post)
    {

        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->authorize('create', Post::class);
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required | max:255'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', $inputs['title'] . " " . 'post was created');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {

        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        // Shows message when post was deleted - NOTE: make sure Session is imported at top: Use...  Also see code at top of index.blade.php
        Session::flash('message', 'Post was deleted');

        return back();
    }

    public function update(Post $post)
    {

        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required | max:255'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs[('title')];
        $post->body = $inputs[('body')];

        $this->authorize('update', $post);

        $post->save();
        session()->flash('post-updated-message', $inputs['title'] . " " . 'post was updated');
        return redirect()->route('posts.index');
    }
}
