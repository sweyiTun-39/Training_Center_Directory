@extends('welcomehome')
@section('content')
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">

                        <h2>Let's Study Together</h2> 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container mt-5">
	<h3 class="text-heading title_color text-center">Category Sample</h3>
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	@foreach($subjects as $subject)
	  <li class="nav-item">
	    <a class="nav-link tab" data-id="{{$subject->id}}" data-toggle="pill" href="../../#" role="tab" aria-controls="pills-chinese">{{$subject->name}}</a>
	  </li>&nbsp;
	 @endforeach
	</ul>
	<div class="tab-content ">
	  <div class="row"  id="pills-tabContent">
	  	
	  </div>
	  
	</div>
	
	
</div>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl-carousel-thumb.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<!--gmaps Js-->
<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE')}}"></script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
		$subid = $(".tab").data('id');
		
		getPosts($subid);
		 

		$(".tab").on('click',function(){
			$subid = $(this).data('id');
			getPosts($subid);
			
		})

		

		function getPosts($sub_id) {
			var sub_id = $sub_id;
			console.log(sub_id);
	    $.post(
	    	"{{route('getsubposts')}}",
	    	{sub_id:sub_id},
	    	function(response){
	        //console.log(response);

	        var html='';
	        $.each(response,function(i,v) {
	        	console.log(i,v);
	        	var pid=v.id;
	          var name = v.name;
	          var image = v.image;
	          var start_date = v.start_date;
	          var end_date = v.end_date;
	          var time = v.time;
	          var fee = v.fee;
	          var description = v.description;
	          var sname = v.sname;
	          var uname = v.uname;
	          console.log(name);
	          var user_id = v.user_id;
	          // var avatar=v.avatar;
	          // console.log(avatar);
	          html += '<div class="col-md-4">'+
	          				'<div class="card mb-4 ">'+
		          				'<div class="card-header">'+
		          						'<img src="'+image+'" class="card-img-top w-100" style="width:250px; height:180px;">'+
		          				'</div>'+
		                    	'<div class="card-body">'+
		                      		'<h4 class="mt-0">'+name+'</h4>'+					                      		
		                      		'<h5>Training '+sname+'</h5>'+
		                 
		                      		'<h6 class="float-right">Fee :'+fee+'</h6>'+
		                      		 
		                      	'</div>'+
		                      	'<div class="card-footer">'+
		                      		'<p>Posted By '+uname+'</p>'+
		                      		'<a href="/getpost/'+pid+'" class="nav-link dtab btn btn-warning float-right" >Detail</a>'+
		                    	'</div>'+
		                  	'</div>'+
	          			'</div>';
	                  
	        })
	        // console.log(html);
	        $('#pills-tabContent').html(html);
	      })

	    }
	    
	})


</script>
@endsection