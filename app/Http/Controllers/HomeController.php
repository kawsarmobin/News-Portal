<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Frontend\Topic;
use App\Models\Frontend\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('num_of_users', User::where('id','!=',auth()->user()->id)->count())
            ->with('num_of_topics', Topic::count())
            ->with('num_of_posts', Post::count());
    }
}
