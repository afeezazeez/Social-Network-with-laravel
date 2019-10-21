<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // many posts belongs to a user
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function likes(){
       return $this->hasMany('App\Like'); 
    }
}
