<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {

        if (auth()->user()->userHasRole('Admin')) {
            $posts = Post::all();
        } else {
            // Only shows posts of the logged in user:
            $posts = auth()->user()->posts()->get();
        }

        return view('admin.posts.index', ['posts' => $posts]);
    }


    public function show(Post $post)
    {

        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        $categories = Category::all();
        $this->authorize('create', Post::class);
        return view('admin.posts.create', compact('categories'));
    }

    public function store()
    {

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required | max:255',
            'category_id' => 'required'
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
        $categories = Category::all();
        $this->authorize('view', $post);
        return view('admin.posts.edit', compact('categories'), ['post' => $post]);
    }


    public function destroy(Post $post)
    {
        // if (auth()->user()->userHasRole('Admin')) {
        //     $post->delete();
        // } else {
        $this->authorize('delete', $post);
        $post->delete();
        // }
        // Shows message when post was deleted - NOTE: make sure Session is imported at top: Use...  Also see code at top of index.blade.php
        Session::flash('message', $post['title'] . " " . 'post was deleted');

        return back();
    }

    public function update(Post $post)
    {

        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required | max:255',
            'category_id' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs[('title')];
        $post->category_id = $inputs[('category_id')];
        $post->body = $inputs[('body')];

        $this->authorize('update', $post);

        $post->save();
        session()->flash('post-updated-message', $inputs['title'] . " " . 'post was updated');
        return redirect()->route('posts.index');
    }

    public function search()
    {
        $search_text = $_GET['query'];

        $posts = Post::where('title', 'LIKE', '%' . $search_text . '%')->get();
        return view('admin.posts.search', compact('posts'));
    }
}
