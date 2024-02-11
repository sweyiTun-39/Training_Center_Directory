@extends('welcomehome')
@section('content')

<div class="container" style="margin-top: 15rem;">
  <h2 class="text-center pb-5">Posts which uploaded in Our Website</h2>
	<div class="row">

  	@foreach($posts as $post)
  	<!-- <div class="card col-lg-4 col-sm-12">
      <div class="card-header">
        <img class="img-fluid" src="{{asset($post->image)}}" alt="" style="height: 200px;" />
        </div>
      <div class="card-body course_content">
        <h4 class="mb-3">
          <a href="getpost/{{$post->id}}">{{$post->cname}}</a>
        </h4>
        <p><span><h5>{{$post->sname}}</h5></span>
          {{$post->description}}
        </p>
        <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
          <div class="mt-lg-0 mt-3">
            <span class="meta_info mr-4">
              <p class="text-left text-info">Fee: {{$post->fee}}</p>
            </span>
          </div>
          </div>
      </div>
    </div> -->

    <div class="col-12 col-lg-6">
      <div class="single-blog-area mb-100 wow fadeInUp w-100" style="height: 500px;" data-wow-delay="250ms">
          <img src="{{asset($post->image)}}" style="height: 200px;" alt="">
          <!-- Blog Content -->
          <div class="blog-content">
              <a href="#" class="blog-headline">
                  <h4><a href="getpost/{{$post->id}}" class="text-primary">{{$post->cname}}</a></h4>
              </a>
              <p>
                <span><h5>{{$post->sname}}</h5></span>
                  {{$post->description}}
              </p>
              <span class="meta_info mr-4">
              <p class="text-right text-info">Fee: {{$post->fee}}</p>
              <p>Posted by : {{$post->uname}}</p>
            </span>
            <a href="/getpost/{{$post->id}}" class="btn btn-warning float-right">See More</a>
          </div>
      </div>
    </div>
  	@endforeach
  </div>
	<!-- {{ $posts->links() }} -->
</div>

@endsection