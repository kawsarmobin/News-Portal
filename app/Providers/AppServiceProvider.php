<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Frontend\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Frontend\Topic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $arch = $this->archive();
        Schema::defaultStringLength(191);
        View::share('topics', $this->topics());
        View::share('archives', $arch['archives']);
        View::share('archive_years', $arch['archive_years']);
    }

    private function archive()
    {
        $archives = Post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('MONTHNAME(created_at) as month_name'),
            DB::raw('count(*) as num_of_posts')
        )
            ->groupBy('year', 'month', 'month_name')->whereRaw('YEAR(created_at) = ' . date('Y'))->orderBy('month', 'desc')->where('created_at', '<=', Carbon::now()->subDay())->get();

        $archive_years = Post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('count(*) as num_of_posts')
        )
            ->groupBy('year')->whereRaw('YEAR(created_at) != ' . date('Y'))->orderBy('year', 'desc')->get();

        return ['archives' => $archives, 'archive_years' => $archive_years];
    }

    private function topics()
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

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
