@extends('welcomehome')
@section('content')
<div class="container-fluid">
  <div class="card mt-5">
      <div class="card-header" style="margin-top: 5rem;">
        <h3 class="d-inline mt-5">Post</h3>
        <p>Advertise now</p>
        @if($eposts == '[]')
        @else
          <a href="{{route('partnerexpired.index')}}" class="alert alert-danger">Expired Posts</a>
        @endif
        <a href="{{route('post.create')}}" class="btn btn-info btn-icon-split float-right mt-5">Add Post</a>

      </div>
      <div class="card-body">
        <table class="table table-striped">
        
          @if($post=='[]')
              <p></p>
              @else
               
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
              @endif
              <tbody>
               
                <?php  
                  $i=1;
                  foreach($post as $post):
                ?>
                

                  <tr>
                    <td scope="row" class="text-center">{{$i}}</td>
                    <td class="text-center">{{$post->name}}</td>
                    <td class="text-center" id="sid">{{$post->sname}}</td>
                    <td class="text-center" id="cid">{{$post->cname}}</td>
                    <td class="text-center">{{$post->fee}}</td>
                    <td class="text-center">
                      <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit
                      </a> &nbsp;&nbsp;&nbsp;&nbsp;
                      <form method="post"action="{{route('post.show',$post->id)}}"class="d-inline-block">
                        @csrf
                        @method('GET')
                        <input type="hidden" value="{{$count}}" name="count">
                         <input type="hidden" name="post_id" value="{{$i}}">
                        <input type="submit" name="btn" class="btn btn-primary" value="Detail">

                      </form>
                       &nbsp;&nbsp;&nbsp;&nbsp;
                      <form method="post"action="{{route('post.destroy',$post->id)}}"class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="btn" class="btn btn-danger" value="Delete">

                      </form>
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
</div>


@endsection