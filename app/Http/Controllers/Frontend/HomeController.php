<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Frontend\Post;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $topic_ids = Topic::leftJoin('topic_user', 'topics.id', '=', 'topic_user.topic_id')
                ->where('topics.user_id', $user_id)
                ->orWhere('topic_user.user_id', $user_id)
                ->orderBy('topics.id')->pluck('topics.id')->toArray();

            $posts = Post::whereIn('topic_id', $topic_ids)->where('created_at', '>=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100);
        } else {
            $posts = Post::where('created_at', '>=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100);
        }

        return view('welcome')
            ->with('posts', $posts);
    }

    public function singlePage($token)
    {
        return view('frontend.single_page')
            ->with('post', Post::where('token', $token)->first());
    }

    public function postsByTopic($slug)
    {
        $topic = Topic::where('slug', $slug)->first();
        $posts = Post::where('topic_id', $topic->id)->latest()->paginate(50);
        return view('frontend.posts_by_topic')
            ->with('posts', $posts)
            ->with('topic', $topic);
    }

    public function archiveData()
    {
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        if (request()->month) {
            $whereClause =
                'YEAR(created_at) = ' . request()->year .
                ' and MONTH(created_at) = ' . request()->month;
                $date_data = $month[--request()->month].' '.request()->year;
        } else {
            $whereClause =
                'YEAR(created_at) = ' . request()->year;
                $date_data = request()->year;
        }

        $posts =  Post::whereRaw($whereClause)->where('created_at', '<=', Carbon::now()->subDay())->paginate(100);
        return view('frontend.posts_by_topic')
            ->with('date_data', $date_data)
            ->with('posts', $posts);
    }
}
