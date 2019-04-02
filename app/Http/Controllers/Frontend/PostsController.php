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
        $user_id = auth()->user()->id;
        $topics = Topic::select(['topics.id', 'topics.name'])
            ->leftJoin('topic_user', 'topics.id', '=', 'topic_user.topic_id')
            ->where('topics.user_id', $user_id)
            ->orWhere('topic_user.user_id', $user_id)
            ->orderBy('topics.name')->get();

        if ($topics->count() == 0) {
            Session::flash('info', 'You must have some topics before attempting to create a post.');
            return back();
        }

        return view('frontend.own.posts.create')
            ->with('topics', $topics)
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

        if ($post = Post::create($attributes)) {
            Session::flash('success', 'Post has been added successfull.');
        }

        return redirect()->route('own-posts.link', $post->id);
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
            'title' => 'required|string|min:2|max:80',
            'summery' => 'required|min:2|max:400',
            'source_link' => 'nullable|url',
        ]);
    }

    public function link(Post $own_post)
    {
        return view('frontend.own.posts.link')
            ->with('post', $own_post);
    }

    public function post_link()
    {
        return view('frontend.own.posts.externel_link')
            ->with('post_link_lists', auth()->user()->posts);
    }
}
