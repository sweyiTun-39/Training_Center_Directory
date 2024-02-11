<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_rating extends Model
{
    //
    protected $fillable=[
    	'user_id','post_id','rating'
    ];
}
