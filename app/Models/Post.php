<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $rules = [
    	'title' => 'required|max:100',
    	'content' => 'required|min:25|max:600'
    ];
    public function user()
{
    return $this->belongsTo('App\User', 'user_id');
}
}
