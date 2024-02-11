@extends('template')
@section('content')
<div class="container-fluid">
   <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
      <!-- <div class="overlay"></div> -->
      <div class="container">
        <div class="row justify-content-center">
           <div class="col-lg-6">
              <div class="banner_content text-center">
                  <!-- <h2>Posts</h2> -->
                  <!-- <div class="page_link">
                      <a href="index.html">Home</a>
                      @foreach($categories as $category)
                        <a class="nav-link" href="/getsubjects?category_id={{$category->id}}">    {{$category->name}}
                        </a>
                       @endforeach
                      </a>
                  </div> -->
              </div>
          </div>
       </div>
      </div>
    </section>
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="d-inline mt-5">Expired Posts</h3>

      </div>
      <div class="card-body">
        <table class="table table-striped">
       <!--  <table border="1" cellpadding="9" cellspacing="7"> -->
        
          
            <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Subject</th>
                  <th scope="col" class="text-center">Category</th>                  
                  <th scope="col" class="text-center">Fee</th>
                  <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php  
                $i=1;
                $todayDate = date("m/d/Y");
                foreach($post as $post):
              ?>
              

                <tr>
                  <td scope="row" class="text-center">{{$i}}</td>
                  <td class="text-center">{{$post->name}}<br>
                    @if($post->status == '1')
                      <p class="alert alert-danger">Expired Post</p>
                    @endif
                  </td>
                  <td class="text-center" id="sid">{{$post->sname}}</td>
                  <td class="text-center" id="cid">{{$post->cname}}</td>
                  <td class="text-center">{{$post->fee}}</td>
                  <td class="text-center">                    
                    <a href="{{route('postadminshow.show',$post->id)}}" class="btn btn-primary">Detail
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;<br>
                    @if($post->status == '1')
                      <form action="{{route('postadminshow.destroy',$post->id)}}" method="post" class="d-inline-block mt-2 mr-3">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="btn" class="btn btn-danger" value="Delete">
                        
                      </form>
                    @endif
                  </td>

                </tr>
                <?php  
                    $i++;
                    endforeach;
                ?>

                
            </tbody>
    </table>
      </div>
    </div>
    
    <hr>
    
</div>

@endsection