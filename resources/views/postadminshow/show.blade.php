@extends('template')
@section('content')
<div class="container-fluid">
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="banner-content text-center">
							<h2>Posts</h2>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="card mt-3">
		<div class="card-body">
			<?php
				$i=1;
				foreach ($posts as $post):
			?>
			<div class="container text-justify">
				<div class="card h-50">
					<div class="card-header">
						<img src="{{($post->image)}}" class="card-img-top" style="height: 300px;">
					</div>
					<div class="card-body">
						<h2>{{$post->name}}</h2>
						<p>{{$post->description}}</p>
						<h3>{{$post->sname}}</h3>
						<p><span>From :</span>{{$post->start_date}}<span>To:</span>
							{{$post->start_date}}<span>at</span>{{$post->time}}
						</p>
						<p><span>Cost</span>{{$post->fee}}</p>
						@if($post->status == '1')
						<p>Expired Post</p>
						<form action="{{route('postadminshow.destroy',$post->id)}}" method="post" class="d-inline-block">
							@csrf
							@method('DELETE')
							<input type="submit" name="btn" class="btn btn-danger" value="Delete">
							
						</form>
						@endif

					</div>
					<div class="card-footer">
						<p><span>Posted by </span>{{$post->uname}}</p>
						<p><span>Centername : </span>{{$post->centername}}</p>
						<p><span>Address </span>{{$post->address}}</p>
						<p><span>Ph No. </span>{{$post->phoneno}}</p>
						
						<div class="float-right">
							
							<form method="post" action="{{route('post.destroy',$post->id)}}" class="d-inline-block">
								@csrf
								@method('PUT')
								<a href="{{route('postadminshow.index')}}" class="btn btn-outline-dark float-right mb-3"> 
	          						<i class="fas fa-backward"></i> Go Back 
	    						</a>
								
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
				$i++;
			endforeach;
			?>
		</div>
	</div>
</div>
@endsection