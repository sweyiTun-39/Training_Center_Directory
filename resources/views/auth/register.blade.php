@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <img src="img/register.jpg" class="w-100 h-100">
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        Registration Form!!!
                                    </h1>
                                </div>
                                <form method="POST"action="{{route('register')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Name') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="centername" class="col-md-4 col-form-label text-md-right">{{ __('FullName') }}</label>

                                        <div class="col-md-8">
                                            <input id="centername" type="text" class="form-control @error('centername') is-invalid @enderror" name="centername" required autocomplete="centername"placeholder="FullName or CenterName" autofocus>

                                            @error('centername')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

                                        <div class="col-md-8">
                                            <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" required autocomplete="profile"placeholder="Profile" autofocus>

                                            @error('profile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Confirm Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phoneno" class="col-md-4 col-form-label text-md-right">{{ __('Phoneno') }}</label>

                                        <div class="col-md-8">
                                            <input id="phoneno" type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"  required autocomplete="phoneno" autofocus>

                                            @error('phoneno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                        <div class="col-md-8">
                                            <input type="text" name="address" id="address" class="form-control" required autocomplete="address" autofocus>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                        <div class="col-md-8">
                                            <input type="radio" name="role" id="student" value="student">
                                            <label for="student">Student</label>

                                            <input type="radio" name="role" id="partner" value="partner">
                                            <label for="partner">Partner</label>                                    
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-outline-primary w-75">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
