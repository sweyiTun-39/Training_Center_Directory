<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
    	'name','image','start_date','end_date','time','fee','description','subject_id','user_id','filename','status'
    ];
}
