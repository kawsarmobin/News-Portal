<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Frontend\Post;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome')
                ->with('posts', Post::where('created_at', '>=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100));
    }
}
