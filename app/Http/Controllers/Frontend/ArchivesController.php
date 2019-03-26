<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Frontend\Post;
use App\Http\Controllers\Controller;

class ArchivesController extends Controller
{
    public function index()
    {
        return view('frontend.archives.index')
                ->with('posts', Post::where('created_at', '<=', Carbon::now()->subDay())->latest()->with(['topic', 'user'])->paginate(100));
    }
}
