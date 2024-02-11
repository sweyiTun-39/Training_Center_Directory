<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        /*$request->validate([
            'comment' => 'required|min:5',
            'post_id' => 'required'
        ]);*/
        //dd($request);
        Comment::create([
            "body" => request('comment') ,
            "post_id" => request('post_id'),
            "user_id" => Auth::user()->id
        ]);
        return response('success');
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
    public function getcomments(Request $request)
    {
        //dd($request);
        $post_id = request('post_id');
        //$comments = Comment::where('post_id',$post_id)->get();
        $comments=DB::table('comments')
                    ->join('users','users.id','=','comments.user_id')
                    ->where('comments.post_id',$post_id)
                    ->select('comments.*','users.name as uname', 'users.profile as profile')
                    ->get();
        return response($comments);
    }

}
