<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_rating;
use Auth;
use Illuminate\Support\Facades\DB;
class Post_ratingController extends Controller
{
    //
    public function rating(Request $request)
    {
    	
        //dd($request);
        $post_id = request('post_id');
        if (!Auth::check()) {
           $user_id = '0';
        }
        else{
            $user_id = Auth::user()->id;
        }
        

         $post = DB::table('post_ratings')
                    ->join('posts','posts.id','=','post_ratings.post_id')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('post_ratings.*','posts.*','posts.name as pname','subjects.name as sname','users.name as uname','categories.name as cname')
                    ->where('post_ratings.post_id','=', $post_id)
                    ->where('post_ratings.user_id','=',$user_id)
                    ->first();
                    //dd($post);
                    if ($post) {
                         //dd($post_id);
                        DB::table('post_ratings')
                        ->where('post_ratings.post_id',  $post_id)
                        ->where('post_ratings.user_id', $user_id)
                        ->update(['rating' => request('rating')]);
                    }else
                        //dd($post_id);
                        Post_rating::create([
                            "user_id" =>  $user_id,
                            "post_id" =>  $post_id,
                            "rating" => request('rating'),
                            
                        ]);
                    

                    $posts= DB::table('post_ratings')
                    ->join('posts','posts.id','=','post_ratings.post_id')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('post_ratings.*','posts.*','posts.name as pname','subjects.name as sname','users.name as uname','categories.name as cname')
                    ->where('post_ratings.post_id','=',$post_id)
                    ->get();
                    /*dd($posts);*/

                     $count = count($posts);
                    //dd($count);
                $ratingstar = DB::table('post_ratings')
                ->where('post_ratings.post_id', $post_id)
                ->sum('rating');
                /*dd($count);*/
                if ($ratingstar != null) {
                    $ratingresult = $ratingstar / $count;
                    $rating = sprintf('%.2f', $ratingresult);
                    
                }else{
                    $rating = '0';
                }
                
                //dd($rating);
        return "$rating";
    
    }
}
