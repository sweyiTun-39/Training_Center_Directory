<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $ratingposts = DB::table('post_ratings')
                    ->join('posts', 'posts.id','=','post_ratings.post_id')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','categories.name as cname','users.centername as centername')
                ->orderby('rating','desc')
                ->paginate(3);
                //dd($ratingposts);
    	$posts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','categories.name as cname','users.centername as centername')
                    ->paginate(6);
        
    	return view('welcome',compact('posts','ratingposts'));
    }
}
