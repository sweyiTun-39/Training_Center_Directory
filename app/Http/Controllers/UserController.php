<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('user.index',compact('user'));
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
        // dd($id);
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('user.show',compact('user'));
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
        $user = User::find($id);
        //dd($user);
        return view('user.edit',compact('user'));
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
        //dd($request);
        $request->validate([
            'name' => 'required|min:2',
            'photo' => 'sometimes|mimes:jpeg,jpg,png|max:5000'
        ]);

        if(request('password'))
        {
            $request->validate(['password' => 'min:8']);
        }

        //upload file
        if($request->hasfile('photo'))
        {
            $image=$request->file('photo');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/user_profile/',$name);
            $photo='/user_profile/'.$name;
        }
        else{
            $photo=request('oldimg');
        }

        //data udate
        $user = User::find($id);
            $user->name = request('name');
            $user->centername = request('name');
            $user->profile = $photo;
            $user->email = request('email');

        if(request('password'))
        {
            $user->password = Hash::make(request('password'));
        }
            $user->phoneno = request('phoneno');
            $user->address = request('address');
            $user->role = request('role');
            $user->save();

       

        //return redirect
        return redirect('/');
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
