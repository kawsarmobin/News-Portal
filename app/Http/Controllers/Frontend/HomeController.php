<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome')
                ->with('posts', Post::latest()->with(['topic', 'user'])->paginate(100));
    }
}
