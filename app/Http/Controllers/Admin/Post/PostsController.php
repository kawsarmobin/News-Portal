<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Frontend\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index')
            ->with('posts', Post::latest()->with(['topic', 'user'])->get());
    }

    public function show(Post $post)
    {
        return view('admin.posts.show')
            ->with('post', $post);
    }

    public function destroy(Post $post)
    {
        if($post->delete()){
            Session::flash('success','Post has been deleted successfully');
        }
        return redirect()->back();
    }
}
