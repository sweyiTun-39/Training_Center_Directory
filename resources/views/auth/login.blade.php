@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="img/un4.jpg" class="w-100 h-100">
                            
                        </div>
                        <div class="col-lg-6 mx-auto" style="background-color: #B0C4DE " >
                            <div class="p-5 mt-3">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-800 mb-4">
                                        Login!
                                    </h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-9">
                                            <input id="email" type="email" class="@error('email') is-invalid @enderror form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail" aria-describedby="emailHelp">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-3">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-9">
                                            <input id="password" type="password" class="@error('password') is-invalid @enderror form-control" name="password" required autocomplete="current-password" id="exampleInputPassword">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-5">
                                            <button type="submit" class="btn btn-outline-dark w-50">
                                                {{ __('Login') }}
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
