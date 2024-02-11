<!DOCTYPE html>
  <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <meta name="description" content="">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->

          <!-- Title -->
          <title>Training Centers Directory</title>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


         <!--  Date Time including today date Picker CSS && JS -->
          
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <!-- End Date Time Picker including today date CSS && JS -->

          <!-- Favicon -->
          <link rel="icon" href="{{asset('img/iconp.png')}}" type="image/png" />

          <!-- Stylesheet -->
          <link rel="stylesheet" href="{{asset('style.css')}}">

          <link href="{{asset('rating/fontawesome-stars.css')}}" rel='stylesheet' type='text/css'>
          
          <!-- Script -->
          <script type="text/javascript" src="{{asset('js/jquery/jquery-3.2.1.min.js')}}"></script>
          <script src="{{asset('rating/jquery.barrating.min.js')}}" type="text/javascript"></script>

      </head>

      <body>
      <!-- Preloader -->
      <div id="preloader">
          <div class="spinner"></div>
      </div>

      <!-- ##### Header Area Start ##### -->
      <header class="header-area">

          <!-- Top Header Area -->
          

          <!-- Navbar Area -->
          <!-- <nav class="navbar navbar-expand-lg bg-light fixed-top" style="line-height: 50px">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>  --> 
          <div class="clever-main-menu collapse navbar-collapse d-inline-block bg-light" id="navbarNavDropdown">
              <div class="classy-nav-container breakpoint-off">
                  <!-- Menu -->
                  <nav class="classy-navbar justify-content-between navbar-expand-lg fixed-top" id="cleverNav">

                      <!-- Logo -->
                      
                      <h3>Training Centers Directory</h3>

                      <!-- Navbar Toggler -->
                      <div class="classy-navbar-toggler">
                          <span class="navbarToggler"></span>
                      </div>

                      <!-- Menu -->
                      <div class="classy-menu">

                          <!-- Close Button -->
                          <div class="classycloseIcon">
                              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                          </div>

                          <!-- Nav Start -->
                          <div class="classynav">
                              <ul class="navbar-nav">
                                  <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
                                  <li class="dropdown nav-item">
                                      <a class="" href="#" id="" role="button" data-toggle="dropdown" aria-expanded="false">
                                      Categories
                                      </a>
                                      <div class="dropdown-menu" style="border: none;">
                                      @foreach($categories as $category)
                                      <a class="dropdown-item" href="/getsubjects?category_id={{$category->id}}">{{$category->name}}</a>
                                      @endforeach
                                      </div>
                                      
                                  </li>
                                  <li class="nav-item"><a href="{{route('allposts.index')}}" class="nav-link">All Posts</a></li>
                                  <li class="nav-item"><a class="nav-link" href="{{route('about')}}">AboutUs</a></li>
                                  <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>

                                  @guest

                                      <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                      </li>
                                      @if (Route::has('register'))
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                          </li>
                                      @endif
                                      @elseif(Auth::check())
                                          <li class="nav-item dropdown">
                                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                              {{ Auth::user()->name }} 
                                              </a>

                                              <div class="dropdown-menu dropdown-menu-right" aria-labelleby="navbarDropdown">
                                                  <a href="../user/show?{{Auth::user()->id}}" class="dropdown-item">
                                                  {{ __('Profile') }}
                                                  </a>
                                        
                                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                                  </a>

                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                                  </form>
                                              </div>
                                          </li>
                                      @if(Auth::user()->role=='partner')
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                                          </li>
                                      @elseif(Auth::user()->role=='admin')
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{route('category.index')}}">Category</a>
                                          </li>

                                      @endif
                                  @endguest
                                  
                              </ul>
                          </div>

                          <!-- Nav End -->
                      </div>
                  </nav>
              </div>
          </div>
          

          
      </header>
      <!-- ##### Header Area End ##### -->

      <div class="container">
        @yield('content')
      </div>

      <!-- ##### Footer Area Start ##### -->
      <footer class="footer-area">
          <!-- Top Footer Area -->
          <div class="top-footer-area">
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <!-- Footer Logo -->
                          <div class="footer-logo">
                              <a href="{{route('welcome')}}"><h4>Training Centers Directory</h4></a>
                          </div>
                          
                          <!-- Copywrite -->
                          <p><a href="#">
              Copyright &copy;<script>document.write(new Date().getFullYear());</script><br>Created with<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Our Three</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->    
                          </p>
                      </div>
          <!-- Bottom Footer Area -->
          <div class="bottom-footer-area d-flex justify-content-between align-items-center">
              <!-- Contact Info -->
              <div class="contact-info">
                  <a href="#"><span>Phone:</span> +959 259 406 106</a>
                  <a href="#"><span>Email:</span> info@tcd.com</a>
              </div>
              <!-- Follow Us -->
              <div class="follow-us">
                  <span>Follow us</span>
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              </div>
          </div>
      </footer>
      @yield('script')
      <!-- ##### Footer Area End ##### -->

      <!-- ##### All Javascript Script ##### -->
      <!-- Popper js -->

      <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
      <!-- Bootstrap js -->
      <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
      <!-- All Plugins js -->
      <script src="{{asset('js/plugins/plugins.js')}}"></script>
      <!-- Active js -->
      <script src="{{asset('js/active.js')}}"></script>

      <!-- Rating Script Function -->
      <script type="text/javascript">

            $(function() {
                $('.rating').barrating({
                    theme: 'fontawesome-stars',
                    onSelect: function(value, text, event) {

                        // Get element id by data-id attribute
                        var el = this;
                        var el_id = el.$elem.data('id');

                        // rating was selected by a user
                        if (typeof(event) !== 'undefined') {
                            
                            var split_id = el_id.split("_");
                             var postid = split_id[1]; // postid

                            var post_id = $("#post_id").val();  // postid
                            console.log(post_id);

                            // AJAX Request
                            
                            $.ajax({
                                url: '../postrating',
                                type: 'POST',
                                data: {post_id:post_id,rating:value},
                                dataType: 'json',
                                success: function(data){
                                    // Update average
                                    
                                }
                            });
                        }
                    }
                });
            });
      </script>
      <!-- End rating Script Function -->
      
      <!-- Date Time Picker Script -->
      <script>
       $(document).ready(function(){
          // Call global the function
          $('.t-datepicker').tDatePicker({
            // options here
          });
        });
      </script>
      <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

      </script>
      <!-- End Date Time Picker Script -->
      <!-- Search Script -->
      <script type="text/javascript">
        $(document).ready(function () {
          //alert("hi");
           $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  }),
        $(document).on('keyup','#search_input',function(){
          //alert("hi");
          var center=$(this).val();
          //console.log(center);
          search_data(center);
        })
        $("#search_input").on('change','#search_input',function () {
          alert('ok');
        
          
            var center=$('#search_input').val();
            //console.log(center);
            
            search_data(center);
             
        })
        function search_data(center) {
          var centers = center;
             console.log(center);
          if(center=''){
            $("#searchdropdown").hide();
          }else{
           
            $.ajax({
                  url:'getposts',
                  data:{},
                  type:'POST',
                  dataType:'json',
                  data: {center:centers},
                  success:function(data){
                     console.log(data);
                      var html=''; var dropsearch = '';
                      $.each(data, function(i,v){
                        var id = v.id;
                        //console.log(id);
                        var photo = v.image;
                        //var name = v.pname;
                        var centername = v.ucentername;
                        var pname = v.name;
                        var sname = v.sname;
                        var start_date = v.start_date;
                        var end_date = v.end_date;
                        var time = v.time;
                        var description = v.description;
                        var fee = v.fee;
                        //console.log(name);

                        dropsearch += '<div class="item dropitem" align="left">' +
                            '<a class="name" href="/getpost/'+ id + '">' +
                        '<img class="thumb my-3 mx-3" src="' + photo + '" width="35px" height="35px">' + centername + '</a></div>';

                        html+=`<div class="col-12 col-lg-4">
                      <div class="single-blog-area mb-100 wow fadeInUp w-100 h-90" data-wow-delay="250ms">
                        <img src="${photo}" style="height: 200px;" alt="">
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4><a href="/getpost/${id}" class="text-primary">${centername}</a></h4>
                            </a>
                            <p>
                              <span><h3>${pname}</h3></span>
                              <span><h5>${sname}</h5></span>
                                
                            </p>
                            <span class="meta_info mr-4">
                            <p class="text-left text-info">Fee: ${fee}</p>
                          </span>
                        </div>
                        <hr>
                        <div class="seat-rating-fee d-flex justify-content-between">
                              <div class="seat-rating h-100 d-flex align-items-center">
                                  <div class="rating">
                                      <i class="fa fa-star ml-2 mt-3" aria-hidden="true"></i> 4.5
                                  </div>
                              </div>
                              <div class="course-fee h-100">
                                  <a href="/getpost/${id}" class="nav-link dtab btn btn-warning float-right mb-2" >Detail</a>
                              </div>
                          </div>
                      </div>
                  </div>`;                      
                      });
                      console.log(html);
                      $("#searchdropdown").html(dropsearch); 
                      $(".search_posts").html(html);
                  }
             });
            $("#searchdropdown").show();
          }
        }
         
        })
      </script>
      <!-- End Search Script -->
      </body>
  </html>