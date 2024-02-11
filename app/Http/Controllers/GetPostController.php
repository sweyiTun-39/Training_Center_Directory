<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Auth;   
class GetPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        /*$posts=DB::table('posts')
                ->join('subjects','subjects.id','=','posts.subject_id')
                ->join('users','users.id','=','posts.user_id')
                ->join('categories','categories.id','=','subjects.category_id')
                ->select('posts.*','subjects.name as sname','categories.name as cname','users.name as uname')
                ->paginate(6);
        // $posts=Post::all();

                // dd($posts);
        return view('allposts',compact('posts'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //dd($id);
        $post= DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','posts.name as pname','subjects.name as sname','users.name as uname','users.centername as centername','users.address as address','users.phoneno as phoneno','categories.name as cname')
                    ->where('posts.id','=',$id)
                    ->first();
                    //dd($post->centername);
                    $centername = $post->centername;
                    $address = $post->address;
                    $phoneno = $post->phoneno;
                    //dd($centername);
                    
                    if (Auth::check() && Auth::user()->role == 'pantner') {
                        # code...
                    
                       $enrollments = DB::table('enrollments')
                       ->join('posts','posts.id','=','enrollments.post_id')
                       ->select('enrollments.*')
                        ->where('enrollments.post_id','=',$id)
                       ->where('enrollments.user_id','=',Auth::user()->id)
                       ->first();
                   }else{
                    $enrollments = null;
                   }
                   //dd($enrollments);
                     $filename = $post->filename;
                    // dd($post);
                    $file = json_decode($filename);
                    $filestring = $file->filename;
                    //dd($filestring);
                    $filerep1 = str_replace('["', '',  $filestring);
                    $file = str_replace('"]', '',  $filerep1);
                    //dd($file);
                    $filearray = explode('","', $file);
                   //dd($post);

                    $posts= DB::table('post_ratings')
                    ->join('posts','posts.id','=','post_ratings.post_id')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('post_ratings.*','posts.*','posts.name as pname','subjects.name as sname','users.name as uname','categories.name as cname')
                    ->where('post_ratings.post_id','=',$id)
                    ->get();
                    //dd($posts);
                    
                     $count = count($posts);
                    //dd($count);
                $ratingstar = DB::table('post_ratings')
                ->where('post_ratings.post_id', $id)
                ->sum('rating');
                //dd($ratingstar);
                if ($ratingstar) {
                   $ratingresult = $ratingstar / $count;
                   $ratingres = sprintf('%.2f', $ratingresult);
                }else{
                    $ratingres = "0";
                }
                
                //dd($ratingres);
                return view('post.show', compact('post','ratingres','posts','filearray','enrollments','centername','address','phoneno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getposts(Request $request)
    {
       
        $center = $request->center;
        
         $posts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->select('posts.*','posts.name as pname','subjects.name as sname','users.name as uname','users.centername as ucentername')
                     ->where('users.centername','LIKE','%'.$center.'%')
                    ->orWhere('subjects.name','LIKE','%'.$center.'%')
                    ->get();
                    //dd($posts);
        return $posts;
    }
    public function getsubposts(Request $request)
    {
        $sub_id = $request->sub_id;
        //dd($center);
         $posts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname')
                    ->where('posts.subject_id','=',$sub_id)
                    ->get();
        return $posts;
    }
    public function getpostdetail(Request $request){
        $post_id=$request->post_id;
        $post=Post::find($post_id);
        return $post;


    }
}
