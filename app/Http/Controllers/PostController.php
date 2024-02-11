<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Subject;
use App\Category;
use App\User;
use Auth;
use App\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('partner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $user_id = Auth::user()->id;
        $category=Category::all();
        if(Auth::check() && Auth::user()->role='partner'){
            $user_id=Auth::user()->id; //2
        // dd($user_id);

        $todayDate = date("m/d/Y");
        $eposts = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','users.centername as centername','users.address as address','users.phoneno as phoneno','categories.name as cname')
                    ->where('posts.end_date','=',$todayDate)
                    ->where('posts.user_id','=',$user_id)
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

        $post = DB::table('posts')
                ->join('subjects','subjects.id','=','posts.subject_id')
                ->join('categories','categories.id','=','subjects.category_id')
                
                ->select('posts.*','subjects.id as sid','subjects.name as sname','categories.id as cid','categories.name as cname')
                ->where('posts.user_id', '=', $user_id)
                ->get();
               /* $count = count($post);
            dd($count);*/
        if ($category_id = request('category_id')) {
            $post = Subject::where('category_id',$category_id)->get();
        }
    }else{

       $post = DB::table('posts')
                ->join('subjects','subjects.id','=','posts.subject_id')
                ->join('categories','categories.id','=','subjects.category_id')
                ->select('posts.*','subjects.id as sid','subjects.name as sname','categories.id as cid','categories.name as cname')
                ->get();
           // dd($posts);
        if ($category_id = request('category_id')) {
            $post = Subject::where('category_id',$category_id)->get();
        }

       
    }

     return view('post.index',compact('post','category','count','eposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$category=Category::all();
        $subject=Subject::all();
        $user=User::all();
        return view('post.create',compact('subject','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'subject'=>'required',
            'image'=>'sometimes|mimes:jpeg,jpg,png|max:5000',
            'startDate'=>'required',
            'endDate'=>'required',
            'time'=>'required',
            'fee'=>'required',
            'description'=>'required|min:5',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip'
           ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }

         $file= new File();
         $file->filename=json_encode($data);

        Post::create([
            "name" => request('name'),
            "subject" => request('subject'),
            "image" => $image ,
            "start_date" =>  request('startDate'),
            "end_date" =>  request('endDate'),
            "fee" =>  request('fee'),
            "time" => request('time'),
            "description" => request('description'),
            "filename" => $file,
            "subject_id" =>  request('subject'),
            "user_id" =>  Auth::user()->id
        ]);
        return redirect()->route('post.index');
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
        $user_id=Auth::user()->id; //2
        // dd($user_id);
        //$post_id = request('post_id');
        $enrollments = DB::table('enrollments')
                     ->join('posts','posts.id','=','enrollments.post_id')
                     ->join('users','users.id','=','posts.user_id')
                      ->join('subjects','subjects.id','=','posts.subject_id')
                     ->where('enrollments.post_id','=',$id)
                     ->where('posts.user_id','=',$user_id)
                     ->select('enrollments.*','posts.*','posts.name as pname', 'subjects.name as sname','users.name as uname')
                    ->get();
                    $count = count($enrollments);
                    //dd($count);
        //$count = request('count');
        /*dd($count);die();*/
         $post = DB::table('posts')
                    ->join('subjects','subjects.id','=','posts.subject_id')
                     ->join('users','users.id','=','posts.user_id')
                     ->join('categories','categories.id','=','subjects.category_id')
                     ->select('posts.*','subjects.name as sname','users.name as uname','categories.name as cname')
                    ->where('posts.id','=',$id)
                    ->first();
                    $filename = $post->filename;
                    // dd($post);
                    $file = json_decode($filename);
                    $filestring = $file->filename;
                    //dd($filestring);
                    $filerep1 = str_replace('["', '',  $filestring);
                    $file = str_replace('"]', '',  $filerep1);
                    //dd($file);
                    $filearray = explode('","', $file);
                    //dd($filearray);

                    /*foreach ($filearray as $file ) {
                        $filename = $file;
                    }*/
                    /*foreach ($filearray as $filearray) {
                        $fname = $filearray;
                    }*/
                    /*foreach ($filearray as $filearray) {
                        $file = $filearray;
                    }*/

                    return view('post.partnershow', compact('post','count','filearray'));
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
        $post = Post::find($id);
        $subject = Subject::all();
        $category=Category::all();
        $filename = $post->filename;
                    $file = json_decode($filename);
                    $filestring = $file->filename;
                    //dd($filestring);
                    $filerep1 = str_replace('["', '',  $filestring);
                    $file = str_replace('"]', '',  $filerep1);
                    //dd($file);
                    $filearray = explode('","', $file);
       /* $post = DB::table('posts')
                ->join('subjects','subjects.id','=','posts.subject_id')
                ->join('categories','categories.id','=','subjects.category_id')
                ->select('posts.*','categories.id as cid','categories.name as cname')
                ->get();
           // dd($posts);
        if ($category_id = request('category_id')) {
            $post = Subject::where('category_id',$category_id)->get();*/
        return view('post.edit',compact('subject','post','category','filearray'));
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
            $image = request('oldimg');
            
        }

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }else{
             
            foreach($request->file('oldfilename') as $file)
            {
                $data[] = $file;  
            }
            
        }

         $file= new File();
         $file->filename=json_encode($data);

        $post = Post::find($id);
        $post->name = request('name');
        $post->subject_id = request('subject');
        $post->image = $image;
        //$post->category_id = request('category');
        //$post->start_date = request('start_date');
        //$post->end_date = request('end_date');
        $post->user_id = Auth::user()->id;
        $post->subject_id = request('subject');
        $post->fee = request('fee');
        $post->time = request('time');
        $post->description = request('description');
        $post->filename = $file;

        $post->save();

        return redirect()->route('post.index');
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
        return redirect()->route('post.index');
    }
    /*public function getposts(Request $request){
        if ($subject_id = request('subject_id')) {
            $posts = Post::where('subject_id',$subject_id)->get();
        }
        return $posts;
    }*/

    public function updatestatus(Request $request){
        //dd($request); 
        /*dd(date("m/d/Y")) ; */
        if(request('res') == "false"){
            //dd(request('post_id'));
            $status = 1;
            $post = Post::find(request('post_id'));
            $post->status = $status;
            $post->save();
        }elseif(request('res') == "true"){
            
            $status = 0;
            $post = Post::find(request('post_id'));
            $post->status = $status;
            $post->save();
        }
        if(request('endDate')){
            $status = 0;
            $post = Post::find(request('post_id'));
            $post->status = $status;
            $post->start_date = date("m/d/Y");
            $post->end_date = request('endDate');
            $post->save();
        }
        return redirect()->route('post.index');
    }
}
