<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Auth;

class PartnerExpiredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $user_id = Auth::user()->id;
        $todayDate = date("m/d/Y");
        $post = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','users.centername as centername','users.address as address','users.phoneno as phoneno','categories.name as cname')
                     ->where('posts.user_id','=',$user_id)
                    ->where('posts.end_date','=',$todayDate)
                    ->get();   

        $posts = DB::table('enrollments')
                     ->join('posts','posts.id','=','enrollments.post_id')
                     ->join('users','users.id','=','posts.user_id')
                      ->join('subjects','subjects.id','=','posts.subject_id')
                     // ->where('enrollments.post_id','=','posts.id')
                     ->where('posts.user_id','=',$user_id)
                     ->select('enrollments.*','posts.*','posts.name as pname', 'subjects.name as sname','users.name as uname')
                    ->get();
                    $count = count($posts);

        return view('partnerexpired.index',compact('post','count'));
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
}
