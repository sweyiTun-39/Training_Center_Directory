@extends('welcomehome')
@section('content')


  <div class="blog-details-content section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                        <p><img src="{{$post->image}}" class="text-center" style="width: 400px; height: 400px; margin-left: 120px;"></p>
                        <h5 class="text-center py-4"></h5>
                        <div>
                            @if($count)
                            <a href="/enrollment?post_id={{$post->id}}"><p>Enrollment List : {{$count}}</p></a>
                            @else
                            <p class="alert alert-danger">There is no enrollment!</p>
                            @endif
                            <h2>{{$post->name}}</h2>
                            <p>{{$post->description}}</p>
                            <?php
                            $i=1;
                            foreach($filearray as $file):
                            ?>
                            <a href="../files/{{$file}}" class="btn btn-success" target="_blank" download="download">Download File ({{$i}})</a>
                            <?php  
                              $i++;
                              endforeach;
                            ?>
                            @php
                            $todayDate = date("m/d/Y");
                            echo $todayDate;
                            @endphp
                            @if(Auth::check() && Auth::user()->role = 'partner' && $todayDate == $post->end_date)
                             <p>Your Advertising Post is .....soon. To Update   &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" id="update" >Update</button></p> 
                            @endif

                            <h3>{{$post->sname}}</h3>
                            <p><span>From :</span>{{$post->start_date}}<span>To :</span>{{$post->start_date}}<span>at </span>{{$post->time}}</p>
                            <p><span>Cost</span> {{$post->fee}}</p>
                            <hr>

                            <p>Posted by {{$post->uname}}</p> 
    
                            <div class="float-right">
                              <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit
                              </a> &nbsp;&nbsp;&nbsp;&nbsp;
                              <form method="post"action="{{route('post.destroy',$post->id)}}"class="d-inline-block">

                              @csrf
                              @method('DELETE')
                                <input type="submit" name="btn" class="btn btn-danger" value="Delete">

                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
  </div>
  <form action="/updatestatus" method="POST">
        @csrf
<div class="modal fade" id="exampleMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Your Advertising Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          <input type="hidden" name="post_id" value="{{$post->id}}" id="post_id">
        <div class="container">
        <!-- Start Date: <input id="startDate" width="276" name="startDate" /> -->
        End Date: <input id="endDate" width="276" name="endDate" />
    </div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
   
    </div>
  </div>
</div>
 </form>
  <script type="text/javascript">

  $(document).ready(function () {
    $("#update").click(function () {
      var res = confirm("Are you sure want to update??");
      console.log(res);
      if(res == true){
        $('#exampleMod').modal('show');
      }
     
      var post_id = $("#post_id").val();
      console.log(post_id);
      var routeURL = "{{route('post.update', ':id')}}";
      routeURL = routeURL.replace(':id', post_id);
      $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                }),
     
      $.ajax({
                url: "/updatestatus",
                data:{},
                type:'POST',
                dataType:'json',
                data: {res:res,post_id:post_id},
                success:function(data){
                }
           });
    })
  })
</script>
@endsection