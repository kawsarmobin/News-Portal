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

        $archives = $this->archive();

        return view('welcome')
            ->with('posts', $posts)
            ->with('topics', $this->topics())
            ->with('archives', $archives['archives'])
            ->with('archive_years', $archives['archive_years']);
    }

    public function singlePage($token)
    {
        $archives = $this->archive();
        return view('frontend.single_page')
                ->with('post', Post::where('token', $token)->first())
                ->with('topics', $this->topics())
                ->with('archives', $archives['archives'])
                ->with('archive_years', $archives['archive_years']);
    }

    public function postsByTopic($slug)
    {
        $archives = $this->archive();

        $topic = Topic::where('slug', $slug)->first();
        $posts = Post::where('topic_id', $topic->id)->latest()->paginate(50);
        return view('frontend.posts_by_topic')
                ->with('posts', $posts)
                ->with('topics', $this->topics())
                ->with('archives', $archives['archives'])
                ->with('archive_years', $archives['archive_years']);
    }

    public function archive()
    {

        $archives = Post::select(DB::raw('YEAR(created_at) as year'),
                                            DB::raw('MONTH(created_at) as month'),
                                            DB::raw('MONTHNAME(created_at) as month_name'),
                                            DB::raw('count(*) as num_of_posts'))
                            ->groupBy('year','month','month_name')->whereRaw('YEAR(created_at) = '.date('Y'))->orderBy('month', 'desc')->get();

        $archive_years = Post::select(DB::raw('YEAR(created_at) as year'),
                            DB::raw('count(*) as num_of_posts'))
            ->groupBy('year')->whereRaw('YEAR(created_at) != '.date('Y'))->orderBy('year', 'desc')->get();

        return ['archives' => $archives,'archive_years'=>$archive_years];
    }

    public function topics()
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            return Topic::select(['topics.id', 'topics.name', 'topics.slug'])
                ->leftJoin('topic_user', 'topics.id', '=', 'topic_user.topic_id')
                ->where('topics.user_id', $user_id)
                ->orWhere('topic_user.user_id', $user_id)
                ->orderBy('topics.name')->get();
        } else {
            return Topic::orderBy('name')->get();
        }
    }

    public function archiveData()
    {
        if(request()->month){
            $whereClause =
                'YEAR(created_at) = '.request()->year.
                ' and MONTH(created_at) = '.request()->month
            ;
        }else{
            $whereClause =
                'YEAR(created_at) = '.request()->year
            ;
        }
        
        $archives = $this->archive();
        $posts =  Post::whereRaw($whereClause)->paginate(100);
        return view('frontend.posts_by_topic')
                ->with('posts', $posts)
                ->with('topics', $this->topics())
                ->with('archives', $archives['archives'])
                ->with('archive_years', $archives['archive_years']);
    }
}
