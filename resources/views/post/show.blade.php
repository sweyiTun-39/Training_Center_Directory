@extends('welcomehome')
@section('content')
<html>
    <head>
    <title>5 Star Rating system with jQuery, AJAX, and PHP</title>
        <!-- CSS -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('rating/fontawesome-stars.css')}}" rel='stylesheet' type='text/css'>
        
        <!-- Script -->
        <script src="{{asset('js/jquery/jquery-3.2.1.min.js')}}"></script>
        
        <script src="{{asset('rating/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('rating/jquery.barrating.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
	          
	        $(function() {
	            $('.rating').barrating({
	                theme: 'fontawesome-stars',
	                onSelect: function(value, text, event) {

	                    // Get element id by data-id attribute
	                    var el = this;
	                    var el_id = el.$elem.data('id');
	                    //alert("el_id");

	                    // rating was selected by a user
	                    if (typeof(event) !== 'undefined') {
	                        
	                        var split_id = el_id.split("_");

	                        var postid = split_id[1];  // postid

	                        // AJAX Request
	                        $.ajaxSetup({
	                          headers: {
	                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                                }
	                              }),
	                        $.ajax({
	                            url: '../postrating',
	                            type: 'post',
	                            data: {post_id:postid,rating:value},
	                            dataType: 'json',
	                            success: function(data){
	                                // Update average
	                                var average = data;
	                                //console.log(average);
	                                if(data){
	                                  $('#avgrating_'+postid).html(data);
	                                }else{
	                                   $('#avgrating_'+postid).html('');
	                                }
	                                
	                            }
	                        });
	                    }
	                }
	            });
	        });

        </script>
    </head>
    <body>
		<div class="blog-details-content section-padding-100">
			<div class="container">
			    <div class="row justify-content-center">
			        <div class="col-12 col-lg-8">
			            <!-- Blog Details Text -->
			            <div class="blog-details-text">
			                <p>
			                	<img src="{{$post->image}}" class="card-img-top" style="height: 300px;">
			                </p>
			                @php
			               	$post_id = $post->id;
			               	$count = count($posts);
			               	if($count>=1){
			               		foreach ($posts as $post) {
			                		$post_id = $post->id;
			                		$rating = $post->rating;
			                
			              		}
			              	}
			              	else{
			              		$rating = '0';
			            	}
			             
			               
			               
			              @endphp
			               @if($message = Session::get('success'))
				            <div class="alert alert-success alert-block col-md-6 offset-3">
				                <button type="button" class="close" data-dismiss = "alert">X</button>
				                <strong>{{$message}}</strong>
				            </div><br>
				        	@endif
			                <h3 class="text-center py-4">{{$centername}}</h3>
			                <h4>{{$post->pname}}</h4>
			                <h5>{{$post->sname}} training.</h5>
			                <p>{{$post->description}}</p>
			                <p><span>From: </span>{{$post->start_date}}<span> - To: </span>{{$post->start_date}}<span> at </span>{{$post->time}}</p>
			                <p class="float-right"> Cost : <span class="h5">{{$post->fee}}</span></p>

			                <div>
					            <select class='rating' id='rating_<?php echo $post_id; ?>' data-id='rating_<?php echo $post_id; ?>'>
					                <option value="1" >1</option>
					                <option value="2" >2</option>
					                <option value="3" >3</option>
					                <option value="4" >4</option>
					                <option value="5" >5</option>
					            </select>
					            <div style='clear: both;'></div>
					              Average Rating : <span class="average" id='avgrating_<?php echo $post_id; ?>'>{{$ratingres}}</span>

					            <!-- Set rating -->
					            <script type='text/javascript'>
					                $(document).ready(function(){
					                    $('#rating_<?php echo $post_id; ?>').barrating('set',<?php echo $rating; ?>);
					                });
					            </script>
					            <p><span>Posted by </span>{{$post->uname}}</p>
					            <p><span>Address </span>{{$address}}</p>
					            <p><span>Ph No. </span>{{$phoneno}}</p>
					            
					            @if(Auth::check() && Auth::user()->role == 'student')
					            <form action="{{route('enrollment.store')}}" method="post">
					            	@csrf
					            	<input type="hidden" name="post_id" value="{{$post_id}}">
					                
					                <button type="submit" class="btn btn-info float-right booking">Booking</button>
					                  
					                &nbsp;&nbsp;&nbsp;&nbsp;
					                
					            </form>
					            <?php
                            		$i=1;
                            		foreach($filearray as $file):
                            	?>
                            	<a href="../files/{{$file}}" class="btn btn-success" target="_blank" download="download">Download File ({{$i}})</a>
	                            <?php  
	                              $i++;
	                              endforeach;
	                            ?>
					            @else
					                
					            @endif
					        </div>
			            </div>
			        </div>
			    </div>
			</div>

			

			<div class="container">
			    <div class="row justify-content-center">
				        <!-- Post A Comment -->
				        <div class="col-12 col-lg-6">
				            <div class="post-a-comments mb-70 mt-5">
				                

				                <!-- <form action="{{route('comment.store')}}" method="post">
				                    <div class="row">
				                        <div class="col-12">
				                            <div class="form-group">
				                            	<input type="hidden" name="post_id" value="{{$post->id}}" id="post_id">
				                                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
				                            </div>
				                        </div>
				                        <div class="col-12">
				                            <button class="btn clever-btn w-100">Post A Comment</button>
				                        </div>
				                    </div>
				                </form> -->
				                <input type="hidden" name="post_id" value="{{$post->id}}" id="post_id">
				                @if(Auth::check())
				                    <h4>Post a Comment</h4>
				               		<div class="form-group">
						              <input type="hidden" name="post_id" value="{{$post->id}}" id="post_id">
						              <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>

						              <button type="submit" class="btn btn-primary mt-3" id="submit">Send</button>
						            </div>
						            @endif
				            </div>
				        </div>
				    </div>

			    <div class="row justify-content-center">
			        <!-- Comments -->
			        <div class="col-12 col-lg-6">
			            <div class="comments-area">
			                <h4>Comments</h4>

			                
			            </div>
			            	<ol class="comments-list">
			                    <!-- Single Comment Area -->
			                    <li class="single_comment_area">
			                        <!-- Single Comment -->
			                        <div class="single-comment-wrap mb-30">
			                            <div class="d-flex justify-content-between mb-30">
			                                <!-- Comment Admin -->
			                                <div class="comment-admin d-flex">
			                                    <div id="showcomments">
          
        										</div>
			                                </div>
			                            </div>
			                        </div>

			                        
			                    </li>
			                </ol>
			        </div>

			        <!-- <div class="col-12">
			            <div class="load-more text-center mt-50">
			                <a href="#" class="btn clever-btn btn-2">Load More</a>
			            </div>
			        </div> -->
			    </div>
			</div>
		</div>
		

    </body>
</html>
@endsection

@section('script')
 <script type="text/javascript">
 	//alert("ok")
   $(document).ready(function(){

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var post_id=$('#post_id').val();
    getComments(post_id);

    $("#submit").click(function(){
     //alert('ok');

     var post_id=$('#post_id').val();
     var comment=$('#comment').val();

      // alert(comment + post_id);

      $.post("{{route('comment.store')}}",{post_id:post_id,comment:comment},function(response){
        //alert('success');
        $('#comment').val('');
        getComments(post_id);

      })
    });

    function getComments(post_id) {

      $.post("{{route('getcomments')}}",{post_id:post_id},function(response){
        console.log(response);

        var html='';
        $.each(response,function(i,v) {
          var body = v.body;
          var user_id = v.user_id;
          var username=v.uname;
          var avatar=v.profile;
          console.log(avatar);
          html += '<div class="media mb-4">'+
                    '<img class="d-flex mr-3 rounded-circle" src="'+avatar+'" width="30px">'+
                    '<div class="media-body">'+
                      '<h5 class="mt-0">'+username+'</h5>'+
                        body+
                    '</div>'+
                  '</div>';
        })
        $('#showcomments').html(html);
      })

    }
    $(".booking").click(function (argument) {
    	alert("Your're successfully enrollment now!!")
    })

   })
 </script>
@endsection