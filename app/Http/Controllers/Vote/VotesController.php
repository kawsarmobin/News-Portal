<?php

namespace App\Http\Controllers\Vote;

use App\Events\VoteAction;
use App\Models\Frontend\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{
    public function vote($post_id)
    {
        $post = Post::findOrfail($post_id);
        if(auth()->check()){
            DB::table('votes')->insert([
                'user_id' => auth()->user()->id,
                'post_id' => $post_id,
            ]);
        }else{
            DB::table('votes')->insert([
                'client_ip' => request()->ip(),
                'post_id' => $post_id,
            ]);
        }

        $post->increment('votes_count');

        broadcast(new VoteAction($post))->toOthers();

        if(request()->expectsJson()){
            return response()->json([
                'message' => $post_id,
            ]);
        }
        return '';
    }
}
