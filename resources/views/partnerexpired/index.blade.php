@extends('welcomehome')
@section('content')
<div class="container-fluid">
   
    <div class="card" style="margin-top: 15rem; margin-bottom: 5rem;">
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
    
    <hr>
    
</div>

@endsection