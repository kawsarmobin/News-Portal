<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['user_id', 'name'];
}
