@extends('welcomehome')
@section('content')
	<div class="blog-details-content section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                        <p><img src="{{$user->profile}}" class="text-center" style="margin-left: auto;" ></p>
                        <h5 class="text-center py-4">{{$user->name}}</h5>
                        <p>Email : {{$user->email}}</p>
						<p>Full/Center Name : {{$user->centername}}</p>
						<p>Role : {{$user->role}}</p>
						<p>Phoneno : {{$user->phoneno}}</p>
						<p>Address : {{$user->address}}</p>
						<a href="{{route('user.edit',$user->id)}}" class="btn btn-info float-right">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection