@extends('template')
@section('content')
	<div class="container">
    <div class="mb-3">
    	  <h5>Add new category</h5>
      <a href="{{route('category.index')}}" class="btn btn-outline-dark float-right mb-3"> 
      	<i class="fas fa-backward"></i> Go Back 
      </a>
      <hr>
      <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{$error}}</li>
        @endforeach
      </ul>
    </div>
    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
      @csrf
			<label for="name">Category:</label>
			<input type="text" name="name" id="name" class="form-control">  <input type="submit" name="btn" class="btn btn-primary mt-3" value="SAVE">
    </form>
  </div>
@endsection