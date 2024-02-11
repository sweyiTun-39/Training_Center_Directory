<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Category;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('admin');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subject=Subject::all();
        $category=Category::all();
        $subject = DB::table('subjects')
                ->join('categories','categories.id','=','subjects.category_id')
                ->select('subjects.*','categories.name as cname')
                ->get();
           // dd($posts);
        if ($category_id = request('category_id')) {
            $subject = Subject::where('category_id',$category_id)->get();
        }
        return view('subject.index',compact('subject','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();
        return view('subject.create',compact('category'));
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
            'name'=>'required|min:2',
            'category'=>'required'
           ]);
        Subject::create([
            'name'=> request('name'),
            'category_id'=> request('category'),
            ]);
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject=Subject::find($id);
        $category=Category::all();
        return view('subject.edit',compact('subject','category'));
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
            'name'=>'required|min:2',
            'category'=>'required'
           ]);
        $subject=Subject::find($id);
        $subject->name=request('name');
        $subject->category_id=request('category');
        $subject->save();
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject=Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index');
    }
    public function getsubjects(Request $request){
        if($category_id = request('category_id')){
            $subjects = Subject::where('category_id',$category_id)->get();
        }
        return view('categorypage',compact('subjects'));
    }
}
