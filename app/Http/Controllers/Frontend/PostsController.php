<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Illuminate\Http\Request;
use App\Models\Frontend\Post;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.own.posts.index')
                ->with('posts', auth()->user()->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.own.posts.create')
                ->with('topics', Topic::orderBy('name')->get())
                ->with('post', new Post());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validatePosts();
        
        $attributes['topic_id'] = $request->topic;
        $attributes['user_id'] = auth()->user()->id;
        $attributes['token'] = str_random(60);

        if (Post::create($attributes)) {
            Session::flash('success', 'Post has been added successfull.');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $own_post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $own_post)
    {
        return view('frontend.own.posts.show')
                ->with('post', $own_post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $own_post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $own_post)
    {
        return view('frontend.own.posts.edit')
                ->with('topics', Topic::orderBy('name')->get())
                ->with('post', $own_post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $own_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $own_post)
    {
        $attributes = $this->validatePosts();
        
        $attributes['topic_id'] = $request->topic;
        $attributes['user_id'] = auth()->user()->id;
        $attributes['token'] = str_random(60);

        if ($own_post->update($attributes)) {
            Session::flash('success', 'Post has been updated successfull.');
        }

        return redirect()->route('own-posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $own_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $own_post)
    {
        if ($own_post->delete()) {
            Session::flash('success', 'Post has been deleted successfull.');
        }

        return redirect()->route('own-posts.index');
    }

    public function validatePosts()
    {
        return request()->validate([
            'topic' => 'required',
            'title' => 'required|string|min:2',
            'summery' => 'required',
            'source_link' => 'nullable|url',
        ]);
    }
}
