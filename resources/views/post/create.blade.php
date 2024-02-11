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
          <title>Training Center Directory</title>
          <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery.1.9.1/jquery.js"></script>
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->


         <!--  Date Time including today date Picker CSS && JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

      
          <!-- Favicon -->
          <link rel="icon" href="{{asset('img/iconp.png')}}" type="image/png" />

          <!-- Stylesheet -->
          <link rel="stylesheet" href="{{asset('style.css')}}">

          <link href="{{asset('rating/fontawesome-stars.css')}}" rel='stylesheet' type='text/css'>
          
         
         
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
          <div class="top-header-area d-flex justify-content-between align-items-center">
              <!-- Contact Info -->
              <div class="contact-info">
                  <a href="#"><span>Phone:</span>+959 259 406 106</a>
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

          <!-- Navbar Area -->
          <div class="clever-main-menu">
              <div class="classy-nav-container breakpoint-off">
                  <!-- Menu -->
                  <nav class="classy-navbar justify-content-between" id="cleverNav">

                      <!-- Logo -->
                      <!-- <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a> -->
                      <h4>Center of Student Progress</h4>

                      <!-- Navbar Toggler -->
                      <div class="classy-navbar-toggler">
                          <span class="navbarToggler"><span></span><span></span><span></span></span>
                      </div>

                      <!-- Menu -->
                      <div class="classy-menu">

                          <!-- Close Button -->
                          <div class="classycloseIcon">
                              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                          </div>

                          <!-- Nav Start -->
                          <div class="classynav">
                              <ul>
                                  <li><a href="{{route('welcome')}}">Home</a></li>
                                  <li class="dropdown">
                                      <a class="" href="#" id="" role="button" data-toggle="dropdown" aria-expanded="false">
                                      Categories
                                      </a>
                                      <div class="dropdown-menu" style="border: none;">
                                      @foreach($categories as $category)
                                      <a class="dropdown-item" href="/getsubjects?category_id={{$category->id}}">{{$category->name}}</a>
                                      @endforeach
                                      </div>
                                      
                                  </li>
                                  <li><a href="{{route('post.index')}}">All Posts</a></li>
                                  <li><a href="{{route('about')}}">About</a></li>
                                  

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
                                              {{ Auth::user()->name }} <span class="caret"></span>
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
                                  <li><a href="{{route('contact')}}">Contact</a></li>
                                  
                              </ul>

                              
                              <!-- Register / Login -->
                              <!-- <div class="register-login-area">
                                  <a href="#" class="btn">Register</a>
                                  <a href="index-login.html" class="btn active">Login</a>
                              </div> -->
                          </div>
                          <!-- Nav End -->
                      </div>
                  </nav>
              </div>
          </div>
      </header>
      <!-- ##### Header Area End ##### -->
     <div class="container-fluid">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="d-inline">Create Post</h3>
            <a href="{{route('post.index')}}" class="btn btn-dark float-right mb-3"> 
                  <i class="fas fa-backward"></i> Go Back 
            </a>
            <hr>
            <ul>
              @foreach($errors->all() as $error)
              <li class="text-danger">{{$error}}</li>
              @endforeach
            </ul>
            
            <ul>
              @foreach($errors->all() as $error)
              <li class="text-danger">{{$error}}</li>
              @endforeach
            </ul>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data" class="mb-auto">
              {{csrf_field()}}
              @csrf
              @method('POST')
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label> Name : </label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label> Subject : </label>
                    <select class="form-control"  name="subject">
                      <option value="">Choose Subject</option>
                      @foreach($subject as $subject)
                        <option value="{{$subject->id}}"> 
                          {{$subject->name}} 
                        </option>

                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-6  mb-3">
                  <label> File : </label>
                  <div class="input-group control-group increment" >
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                      <input type="file" name="filename[]" class="form-control">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <label> Image : </label><br>
                  <input type="file" name="image">
                </div>
                
                <div class="col-md-4 float-right">
                  <div class="container">
                    Start Date: <input id="startDate" width="276" name="startDate" />
                    End Date: <input id="endDate" width="276" name="endDate" />
                    <input type="hidden" name="enddate" id="date">
                </div>
                </div>

              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="description"> Description : </label>
                  <textarea class="form-control" name="description" style="height: 110px;"></textarea>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                        <label for="name"> Time : </label>
                        <input type="text" name="time" id="time" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="name"> Fee : </label>
                        <input type="text" name="fee" id="fee" class="form-control">
                    </div>
                  </div>
                </div>
              </div>    
              <input type="submit" name="btn" class="btn btn-primary float-right" value="Upload">          
            </form>
          </div>
        </div>
      </div>
      <script>
          var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
          $('#startDate').datepicker({
              uiLibrary: 'bootstrap4',
              iconsLibrary: 'fontawesome',
              minDate: today,
              maxDate: function () {
                  return $('#endDate').val();
              }
          });
          $('#endDate').datepicker({
              uiLibrary: 'bootstrap4',
              iconsLibrary: 'fontawesome',
              minDate: function () {
                  return $('#startDate').val();
              }
          });

      </script>
       <footer class="footer-area">
          <!-- Top Footer Area -->
          <div class="top-footer-area">
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <!-- Footer Logo -->
                          <div class="footer-logo">
                              <a href="{{route('welcome')}}"><h4>Center of Student Progress</h4></a>
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
        $(document).ready(function(){
          $(".clone").hide();
          $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
          });
          $("body").on("click", ".btn-danger", function(){
            $(this).parents(".control-group").remove();
          })
        })
      </script>
     
      </body>
  </html>