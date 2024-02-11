<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno'=>['required','string','min:9'],
            'address'=>['required','string','max:225'],
            'centername'=>['required','string','min:5','max:255'],
            'role'=>'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fileName = 'null';

        if (Input::file('profile')->isValid()) {
            $destinationPath = public_path('image');
            $extension = Input::file('profile')->getClientOriginalExtension();
            $fileName = '/image/'.uniqid().'.'.$extension;
            Input::file('profile')->move($destinationPath,$fileName);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phoneno'=>$data['phoneno'],
            'address'=>$data['address'],
            'centername'=>$data['centername'],
            'role'=>$data['role'],
            'profile'=>$fileName
        ]);
    }
    public function authenticated($request,$user){
        if($user->role == 'admin'){
            return redirect('category');
        }
        elseif($user->role == 'partner'){
            return redirect('/');
        }
        elseif($user->role == 'student'){
            return redirect('/');
        }
    }
}
