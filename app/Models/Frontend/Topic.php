<?php

namespace App\Models\Frontend;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function isFollowed()
    {
        return auth()->user()->topics()->where('topic_id',$this->id)->first()?true:false;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
