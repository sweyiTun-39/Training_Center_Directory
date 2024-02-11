<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        // $center = $request->center;
         $posts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname')
                     ->where('posts.user_id','=',$user_id)
                    
                    ->get();

                    // dd($posts);
        return view('post.index');
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

    public function enrollments(Request $request)
    {
        //

        //dd($request);
        $post_id = $request->post_id;

        $user_id=Auth::user()->id; //2
        //dd($user_id);
        $post_id = request('post_id');
        $enrollments = DB::table('enrollments')
                     ->join('posts','posts.id','=','enrollments.post_id')
                     ->join('users','users.id','=','posts.user_id')
                      ->join('subjects','subjects.id','=','posts.subject_id')
                     // ->where('enrollments.post_id','=','posts.id')
                     ->where('posts.user_id','=',$user_id)
                     ->where('enrollments.post_id','=',$post_id)
                     ->select('enrollments.*','posts.*','posts.name as pname','posts.image as pimage', 'subjects.name as sname','users.name as uname','users.profile as profile','users.email as email', 'users.phoneno as phoneno','users.created_at as created_at')
                    ->get();

                    $image = $enrollments[0]->pimage;
                    $pname = $enrollments[0]->pname;
                    $sname = $enrollments[0]->sname;
                    $fee = $enrollments[0]->fee;

        $enrollmentslist = DB::table('enrollments')
                     ->join('posts','posts.id','=','enrollments.post_id')
                     ->join('users','users.id','=','enrollments.user_id')
                      ->join('subjects','subjects.id','=','posts.subject_id')
                     // ->where('enrollments.post_id','=','posts.id')
                     //->where('user_id','=',$user_id)
                     ->where('enrollments.post_id','=',$post_id)
                     ->select('enrollments.*','posts.*','posts.name as pname', 'subjects.name as sname','users.name as uname','users.profile as profile','users.email as email', 'users.phoneno as phoneno','users.created_at as created_at')
                    ->get();

        //dd($enrollments);
                    
    return view('post.adminenrollment',compact('enrollments','enrollmentslist','image','pname','sname','fee'));
    }

}
