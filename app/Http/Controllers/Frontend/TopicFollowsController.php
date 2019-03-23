<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Topic;

class TopicFollowsController extends Controller
{
    public function index()
    {       
        // $topics_with_follow = []; 
        $topics = Topic::whereNotIn('user_id', [auth()->user()->id])->get();
        // $allready_follow_topic = auth()->user()->topics;
        
        // Itareate through all topics for check user already follow this topics
        // foreach($topics as $t){
        //     $twf = [];
        //     $twf['id'] = $t->id;
        //     $twf['name'] = $t->name;

        //     foreach ($allready_follow_topic as $value) {
        //         // If user already follow a topics make is follow true for frontend
        //         if($value->pivot->topic_id == $t->id){
        //             $twf['isFollow'] = true;
        //             break;
        //         }else{
        //             $twf['isFollow'] = false;
        //         }
        //     }
        //     $topics_with_follow[] = $twf;
        // }

        return view('frontend.topicfollows.index')
                ->with('topics', $topics);
    }

    public function follow($topic_id)
    {
        if(auth()->user()->topics()->where('topic_id', $topic_id)->first()){
            auth()->user()->topics()->detach($topic_id);
            Session::flash('success', 'Topic unfollow successfully.');
        } else {
            auth()->user()->topics()->attach($topic_id);
            Session::flash('success', 'Topic follow successfully.');
        }
        return back();

        
    }
}
