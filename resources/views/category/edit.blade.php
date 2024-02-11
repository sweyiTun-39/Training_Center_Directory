@extends('template')
@section('content')
<div class="container">
	<div class="mb-3">
		<h1>Edit Category</h1>
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
	<form method="post" action="{{route('category.update',$category->id)}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label>Name:</label>
			<input type="text" class="form-control" name="name" value="{{$category->name}}">
		</div>
		<input type="submit" class="btn btn-primary" name="update" value="Update">

	</form>
</div>
@endsection