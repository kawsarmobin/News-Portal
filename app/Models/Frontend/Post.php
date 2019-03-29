<?php

namespace App\Models\Frontend;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'topic_id', 'title', 'slug', 'summery', 'source_link', 'token',
    ];

    protected $appends = [
        'votes_count',
        'is_voted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value . ' ' . time());
    }

    public function getVotesCountAttribute()
    {
        return DB::table('votes')->where('post_id',$this->id)->count();
    }

    public function getIsVotedAttribute()
    {
        if(auth()->check()){
            return DB::table('votes')->where('user_id',auth()->user()->id)->where('post_id',$this->id)->first()?true:false;
        }else{
            return DB::table('votes')->where('client_ip',request()->ip())->where('post_id',$this->id)->first()?true:false;
        }
    }
}
