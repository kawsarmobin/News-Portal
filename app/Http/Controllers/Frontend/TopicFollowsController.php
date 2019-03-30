<?php

namespace App\Http\Controllers\Frontend;

use Session;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class TopicFollowsController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $topics = Topic::whereNotIn('user_id', [auth()->user()->id])->orderBy('name')->get();
        } else {
            $topics = Topic::orderBy('name')->get();
        }

        return view('frontend.topicfollows.index')
                ->with('topics', $topics);
    }

    public function follow($topic_id)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        if(auth()->user()->topics()->where('topic_id', $topic_id)->first()){
            auth()->user()->topics()->detach($topic_id);
            Session::flash('success', 'Topic unfollow successfully.');
        } else {
            auth()->user()->topics()->attach($topic_id);
            Session::flash('success', 'Topic follow successfully.');
        }
        return back();

        
    }
}
