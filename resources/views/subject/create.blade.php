@extends('template')
@section('content')
	<div class="container-fluid">
		<div class="mb-3">
			<h2>Subject Create Form</h2>
			<a href="{{route('subject.index')}}" class="btn btn-outline-dark float-right mb-3"> 
	          <i class="fas fa-backward"></i> Go Back 
	    	</a>
	    	<hr>
	        <ul>
	          @foreach($errors->all() as $error)
	          <li class="text-danger">{{$error}}</li>
	          @endforeach
	        </ul>					
		</div>
		<form action="{{route('subject.store')}}" method="post">
			@csrf
			@method('POST')
			<div class="form-group">
				<label> Category : </label>
				<select class="form-control"  name="category">
					<option value="">Choose Category</option>
					@foreach($category as $category)
						<option value="{{$category->id}}"> 
							{{$category->name}} 
						</option>

					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label> Name : </label>
				<input type="text" name="name" class="form-control" width="50">
			</div>

			<button class="btn btn-primary mt-3" >SAVE</button>
		</form>
			
		
		
	</div>
@endsection