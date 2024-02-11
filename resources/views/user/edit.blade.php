@extends('welcomehome')
@section('content')
	<div class="blog-details-content section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                        <form method="POST"action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Name') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

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
                                            <input id="centername" type="text" class="form-control @error('centername') is-invalid @enderror" name="centername" required autocomplete="centername" value="{{$user->centername}}" autofocus>

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
                                            <!-- <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" required autocomplete="profile"placeholder="Profile" autofocus> -->

                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo </a>
                        
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo </a>
                                                </div>
                                            </nav>
                                            <div class="tab-content mt-3" id="nav-tabContent">
                                                <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <img src="{{ asset($user->profile)}}" width="100">
                                                    <input type="hidden" name="oldimg" value="{{$user->profile}}">
                                                </div>

                                            <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      
                                                <input type="file" name="image" value="$image">
                    
                                            </div>
                                        </div>

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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="password">
                                        <div class="form-group row">
                                        <div class="col-md-4 col-form-label text-md-right"></div>
                                        <div class="col-md-8">
                                            
                                            <input type="checkbox" name="oldpwd" id="oldpwd" value="{{$user->password}}">
                                            <label for="oldpwd">{{__('Change Password')}}</label>
                                            <input type="hidden" name="oldpwd" value="{{$user->password}}">
                                        </div>
                                    </div>

                                    <div class="" id="newpassword">
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

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
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <label for="phoneno" class="col-md-4 col-form-label text-md-right">{{ __('Phoneno') }}</label>

                                        <div class="col-md-8">
                                            <input id="phoneno" type="text" class="form-control @error('phoneno') is-invalid @enderror" value="{{$user->phoneno}}" name="phoneno"  required autocomplete="phoneno" autofocus>

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
                                            <input type="text" name="address" id="address" class="form-control" value="{{$user->address}}" required autocomplete="address" autofocus>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                        <div class="col-md-8">
                                            <input type="radio" name="role" id="user" value="user" <?php if ($user->role=='user'): ?>checked
                                                    <?php endif; ?>>
                                            <label for="user">User</label>

                                            <input type="radio" name="role" id="partner" value="partner" <?php if ($user->role=='partner'): ?>checked
                                                    <?php endif; ?>>
                                            <label for="partner">Partner</label>                                    
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script type="text/javascript">
    $(document).ready(function () {

        $("#newpassword").hide();

        $("#oldpwd").click(function () {
            if(oldpwd.checked==true)
            {
                $("#newpassword").show();
            }
            else{
                $("#password").val('');
                $("#newpassword").hide();
            }

        })      

    })
  </script>
@endsection