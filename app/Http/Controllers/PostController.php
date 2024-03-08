<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Livewire\Component;

class PostController extends Component
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve blog posts (e.g., from a database)
        $posts = Post::latest()->with('createdBy')->get();

        return view('dashboard', compact('posts'));
    }

    /**
     * Display the form for creating a new post
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Logic to retrieve the blog post with the given ID
        $post->load('createdBy');

        return view('livewire.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
