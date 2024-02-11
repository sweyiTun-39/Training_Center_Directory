<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Subject;
use App\Category;
use App\User;
use Auth;

class PostadminshowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function index()
    {
        $post=Post::all();
        $post = DB::table('posts')
                ->join('subjects','subjects.id','=','posts.subject_id')
                ->join('categories','categories.id','=','subjects.category_id')
                ->select('posts.*','subjects.id as sid','subjects.name as sname','categories.id as cid','categories.name as cname')
                ->get();
        $todayDate = date("m/d/Y");
        $eposts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','users.centername as centername','users.address as address','users.phoneno as phoneno','categories.name as cname')
                    ->where('posts.end_date','=',$todayDate)
                    ->get();        
        return view('postadminshow.index',compact('post','eposts'));
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
        $request->validate([
            'name' => 'required',
            'subject'=>'required',
            'image'=>'sometimes|mimes:jpeg,jpg,png|max:5000',
            't-start'=>'required',
            't-end'=>'required',
            'time'=>'required',
            'fee'=>'required',
            'description'=>'required|min:5',
           ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }
        Post::create([
            "name" => request('name'),
            "subject" => request('subject'),
            "image" => $image ,
            "start_date" =>  request('t-start'),
            "end_date" =>  request('t-end'),
            "fee" =>  request('fee'),
            "time" => request('time'),
            "description" => request('description'),
            "subject_id" =>  request('subject'),
            "user_id" =>  Auth::user()->id
        ]);
        return redirect()->route('post.adminshow');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $posts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','users.centername as centername','users.address as address','users.phoneno as phoneno','categories.name as cname')
                    ->where('posts.id','=',$id)
                    ->get();
        
                    return view('postadminshow.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $subject = Subject::all();
        $category=Category::all();
        return view('post.edit',compact('subject','post','category'));
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
        $request->validate([
            'name' => 'required',
            'subject'=>'required',
            'image'=>'sometimes|mimes:jpeg,jpg,png|max:3000',
            'fee'=>'required'
           ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }else{
            $image = '/image/'.$name;
        }
        $post = Post::find($id);
        $post->name = request('name');
        $post->subject_id = request('subject');
        $post->image = $image;
        $post->user_id =  Auth::user()->id;
        $post->subject_id = request('subject');
        $post->fee = request('fee');
        $post->time = request('time');
        $post->description = request('description');
        $post->save();

        return redirect()->route('post.adminshow');
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
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('postadminshow.index');
    }

}