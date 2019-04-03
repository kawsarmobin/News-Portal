<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Frontend\Post;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('posts', $this->posts());
    }

    public function singlePage($token)
    {
        return view('frontend.single_page')
            ->with('post', Post::where('token', $token)->first())
            ->with('posts', $this->ex_posts($token));
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

    public function popular()
    {
        if (config('topics.topic_post_check')) {
            return $this->popular_with_topics();
        } else {
            return $this->popular_without_topics();
        }
    }

    private function popular_with_topics()
    {
        Post::orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')->get();

        if (auth()->check()) {
            $topic_ids = $this->user_topics_id();

            if (config('archive.archive_check')) {
                $posts = Post::whereIn('topic_id', $topic_ids)->where('created_at', '>=', Carbon::now()->subDay())
                ->orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['topic', 'user'])->paginate(100);
            } else {
                $posts = Post::whereIn('topic_id', $topic_ids)
                ->orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['topic', 'user'])->paginate(100);
            }
        } else {
            if (config('archive.archive_check')) {
                $posts = Post::where('created_at', '>=', Carbon::now()->subDay())
                ->orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['topic', 'user'])->paginate(100);
            } else {
                $posts = Post::orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['topic', 'user'])->paginate(100);
            }
        }

        return view('frontend.popular')
                ->with('posts', $posts);
    }

    private function popular_without_topics()
    {
        Post::orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')->get();

        if (auth()->check()) {
            if (config('archive.archive_check')) {
                $posts = Post::where('created_at', '>=', Carbon::now()->subDay())
                ->orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['user'])->paginate(100);
            } else {
                $posts = Post::orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['user'])->paginate(100);
            }
        } else {
            if (config('archive.archive_check')) {
                $posts = Post::where('created_at', '>=', Carbon::now()->subDay())
                ->orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['user'])->paginate(100);
            } else {
                $posts = Post::orderBy('votes_count', 'DESC')->where('votes_count', '!=', '0')
                ->latest()->with(['user'])->paginate(100);
            }
        }

        return view('frontend.popular')
                ->with('posts', $posts);
    }

    public function new()
    {
        return view('frontend.new')
            ->with('posts', $this->posts());
    }

    public function posts()
    {
        if (config('topics.topic_post_check')) {
            return $this->posts_with_topics();
        } else {
            return $this->posts_without_topics();
        }
    }

    private function posts_with_topics()
    {
        if (auth()->check()) {
            $topic_ids = $this->user_topics_id();

            if (config('archive.archive_check')) {
                return Post::whereIn('topic_id', $topic_ids)
                            ->where('created_at', '>=', Carbon::now()->subDay())
                            ->latest()->with(['topic', 'user'])
                            ->paginate(100);
            } else {
                return Post::whereIn('topic_id', $topic_ids)->latest()->with(['topic', 'user'])->paginate(100);
            }
        } else {
            if (config('archive.archive_check')) {
                return Post::where('created_at', '>=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100);
            } else {
                return Post::latest()->with(['topic', 'user'])->paginate(100);
            }
        }
    }

    private function posts_without_topics()
    {
        if (auth()->check()) {
            if (config('archive.archive_check')) {
                return Post::where('created_at', '>=', Carbon::now()->subDay())
                            ->latest()->with(['user'])
                            ->paginate(100);
            } else {
                return Post::latest()->with(['user'])->paginate(100);
            }
        } else {
            if (config('archive.archive_check')) {
                return Post::where('created_at', '>=', Carbon::now()->subDay())->latest()->with(['user'])->paginate(100);
            } else {
                return Post::latest()->with(['user'])->paginate(100);
            }
        }
    }

    public function ex_posts($token)
    {
        if (config('topics.topic_post_check')) {
            return $this->ex_posts_with_topics($token);
        } else {
            return $this->ex_posts_without_topics($token);
        }
    }

    private function ex_posts_with_topics($token)
    {
        if (auth()->check()) {
            $topic_ids = $this->user_topics_id();

            if (config('archive.archive_check')) {
                return Post::whereIn('topic_id', $topic_ids)
                            ->where('token', '!=',$token)
                            ->where('created_at', '>=', Carbon::now()->subDay())
                            ->latest()->with(['topic', 'user'])
                            ->paginate(100);
            } else {
                return Post::whereIn('topic_id', $topic_ids)->where('token', '!=',$token)->latest()->with(['topic', 'user'])->paginate(100);
            }

        } else {
            if (config('archive.archive_check')) {
                return Post::where('created_at', '>=', Carbon::now()->subDay())->where('token', '!=',$token)->latest()->with(['topic', 'user'])->paginate(100);
            } else {
                return Post::latest()->where('token', '!=',$token)->with(['topic', 'user'])->paginate(100);
            }
        }
    }

    private function ex_posts_without_topics($token)
    {
        if (auth()->check()) {
            if (config('archive.archive_check')) {
                return Post::where('token', '!=',$token)
                            ->where('created_at', '>=', Carbon::now()->subDay())
                            ->latest()->with(['user'])
                            ->paginate(100);
            } else {
                return Post::where('token', '!=',$token)->latest()->with(['user'])->paginate(100);
            }
        } else {
            if (config('archive.archive_check')) {
                return Post::where('created_at', '>=', Carbon::now()->subDay())->where('token', '!=',$token)->latest()->with(['user'])->paginate(100);
            } else {
                return Post::latest()->where('token', '!=',$token)->with(['user'])->paginate(100);
            }
        }
    }

    private function user_topics_id()
    {
        $user_id = auth()->user()->id;
            return Topic::leftJoin('topic_user', 'topics.id', '=', 'topic_user.topic_id')
                ->where('topics.user_id', $user_id)
                ->orWhere('topic_user.user_id', $user_id)
                ->groupBy('topics.id')
                ->orderBy('topics.id')->pluck('topics.id')->toArray();
    }
}
