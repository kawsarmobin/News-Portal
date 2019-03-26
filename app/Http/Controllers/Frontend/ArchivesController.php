<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Frontend\Post;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class ArchivesController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $topics = Topic::leftJoin('topic_user', 'topics.id', '=', 'topic_user.topic_id')
                ->where('topics.user_id', $user_id)
                ->orWhere('topic_user.user_id', $user_id)
                ->orderBy('topics.id')->pluck('topics.id')->toArray();
            $posts = Post::whereIn('topic_id', $topics)->where('created_at', '<=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100);
        } else {
            $posts = Post::where('created_at', '<=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100);
        }
        return view('frontend.archives.index')
            ->with('posts', $posts);
    }
}
