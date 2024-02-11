@extends('welcomehome')
@section('content')
<!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">

                        <h2>Let's Study Together</h2>
                        <div class="clever-main-menu">
                            <div class="search-area text-center">
                                
                                    <!-- <input type="text"  id="search_input" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                                    <form action="" method="" onclick="event.preventDefault();
                                                             document.getElementById('search_input').submit();">
                                        <a ><input type="text" id="search_input" placeholder="Search By Languages "/>
                                        <button type="submit" class="btnsearch d-inline-block" id="search_input"><i class="fa fa-search" aria-hidden="true"></i></button></a>
                                        <div class="suggestions mt-4" id="searchdropdown" style="display: block; border-color: black; background-color: white;">
                                            
                                        </div>

                                    </form>
                                     

                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3><strong>Popular Courses at partner's centers</strong></h3>
                    </div>
                </div>
            </div>

            <div class="row search_posts">
                

                @foreach($posts as $post)
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area mb-100 wow fadeInUp w-100 h-90" data-wow-delay="250ms">
                      <img src="{{asset($post->image)}}" style="height: 200px;" alt="">
                      <!-- Blog Content -->
                      <div class="blog-content">
                          <a href="#" class="blog-headline">
                              <h4><a href="getpost/{{$post->id}}" class="text-primary">{{$post->cname}}</a></h4>
                          </a>
                          <p>
                            <span><h5>{{$post->sname}}</h5></span>
                              
                          </p>
                          <span class="meta_info mr-4">
                          <p class="text-left text-info">Fee: {{$post->fee}}</p>
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
                                <a href="/getpost/{{$post->id}}" class="nav-link dtab btn btn-warning float-right mb-2" >Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
                {{ $posts->links()}}
            </div>
            
        </div>
    </section>
    <!-- ##### Popular Courses End ##### -->

    <!-- ##### Best Tutors Start ##### -->
    
    <!-- ##### Best Tutors End ##### -->

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center mt-5" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <img src="image/un3.jpg" class="w-75 h-75">
                <div class="row">
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Now Countdown -->
        <div class="mb-100 wow fadeInUp col-md-7" data-wow-delay="500ms">
            <h1>Warmly Welcome From Our Website</h1><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae. Donec bibendum tortor sed mi faucibus vehicula. Sed erat lorem</p>

            <h2><i>Get Start with us</i></h2>
            <!-- Register Countdown -->
            <!-- <div class="register-countdown">
                <div class="events-cd d-flex flex-wrap" data-countdown="2019/03/01"></div>
            </div> -->
        </div>
    </section>
    <!-- ##### Register Now End ##### -->

    <!-- ##### Upcoming Events Start ##### -->
    <section class="upcoming-events section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Top rated Courses</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                @foreach($ratingposts as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="{{asset($post->image)}}" style="height: 300px;" alt="">
                            <h6 class="event-date">{{$post->start_date}}</h6>
                            <h4 class="event-title"><a href="getpost/{{$post->id}}" class="text-white" style="font-size: 20px">{{$post->cname}}</a></h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i>{{$post->time}}</p>
                            </div>
                            <div class="events-fee">
                                <a href="#">{{$post->fee}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- {{ $ratingposts->links() }} -->
            </div>
            
        </div>
    </section>
    <!-- ##### Upcoming Events End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>From Our Partners</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="img/blog-img/1.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>Japanese Grammer</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Lighton Japanese Center</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Speaking & Listening</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/blog-img/2.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>Networking Advanced</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Myanmar IT Consulting</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Advanced in TCP/IP</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="blog-area section-padding-100-0 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>From Our Partner Training Centers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img class="img-fluid" src="img/trainer/MIC.jpg" alt="" style="width:400px;  height: 200px;" />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>MIT</h4>
                        <p class="designation">Myanmar IT Consulting</p>
                        <div class="mb-4">
                            <p>
                                “Design is like a mom, nobody notices when she’s around, but everybody misses her when she’s not."
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img class="img-fluid" src="img/trainer/lighton.jpg" alt="" style="width:400px;  height: 200px;"/>
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>Lighton</h4>
                        <p class="designation">Business & Computing</p>
                        <div class="mb-4">
                            <p>
                                “Google Analytics is the best friend of all SEO Specialist and Digital Marketer around the globe.”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-instagram"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img class="img-fluid" src="img/trainer/flamts.jpg" alt="" style="width:400px;  height: 200px;"/>
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>First Light</h4>
                        <p class="designation">Engineering & Robotics</p>
                        <div class="mb-4">
                            <p>
                                “Good design is like a refrigerator—when it works, no one notices, but when it doesn’t, it sure stinks.”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </section>

    <!-- ##### Blog Area End ##### -->
@endsection