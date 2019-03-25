<?php

namespace App;

use App\Models\Frontend\Topic;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Frontend\Post;

class User extends Authenticatable
{
    use Notifiable;

    const PATH = 'uploads/avatar';
    const THUMBNAIL_PATH = self::PATH.'/thumbnail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','website','sub_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function ownTopics()
    {
        return $this->hasMany(Topic::class)->orderBy('name');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->with('topic');
    }

    public function isAdmin()
    {
        return $this->is_admin?true:false;
    }

    public function getUserAvatarAttribute()
    {
        return asset(self::PATH.'/'.$this->avatar);
    }

    public function getAvatarThumbnailAttribute()
    {
        return asset(self::THUMBNAIL_PATH.'/'.$this->avatar);
    }
}
