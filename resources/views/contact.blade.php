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
    <!-- ##### Contact Area Start ##### -->
  <div class="container-fluid my-4">
    <section class="home_banner_area">
      <div class="banner_inner d-flex align-items-center">
        <!-- <div class="overlay"></div> -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center" style="color: black; font-weight: bold; font-style: italic;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <section class="contact_area section_gap">
        <div class="container">
            <div
              id="mapBox"
              class="mapBox"
              data-lat="40.701083"
              data-lon="-74.1522848"
              data-zoom="13"
              data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
              data-mlat="40.701083"
              data-mlon="-74.1522848"
            >
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24812.393718921445!2d96.12332264409318!3d16.85337108620657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45b19605a43c3143!2sMyanmar+IT+Consulting!5e0!3m2!1sen!2smm!4v1561641512261!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="row my-4">
                <div class="col-lg-3">
                    <div class="contact_info">
                      <div class="info_item">
                        <i class="ti-home"></i>
                        <h6>Center of Student Progress</h6>
                        <p>Myanmar</p>
                      </div>
                      <div class="info_item">
                        <i class="ti-headphone"></i>
                        <h6><a href="#">09-772750503</a></h6>
                        <p>Mon to Fri 9 am to 5 pm</p>
                      </div>
                      <div class="info_item">
                        <i class="ti-email"></i>
                        <h6><a href="#">studentprogress@gmail.com</a></h6>
                        <p>Send us your query anytime!</p>
                      </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form action="{{route('message.store')}}" method="POST"
                      class="row contact_form"
                      action="contact_process.php"
                      method="post"
                      id="contactForm"
                      novalidate="novalidate"
                    >
                    @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter your name"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter your name'"
                                required=""
                              />
                            </div>
                            <div class="form-group">
                              <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter email address"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter email address'"
                                required=""
                              />
                            </div>
                            <div class="form-group">
                              <textarea
                                class="form-control"
                                name="message"
                                id="message"
                                rows="1"
                                placeholder="Enter Message"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Message'"
                                required=""
                              ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 ">
                            <button type="submit" class="btn primary-btn btn-primary" id="btnmessage">
                              Send Message
                            </button> 
                            <!-- <form action="{{route('message.store')}}" method="POST">
                              @csrf -->
                              <!-- <input type="button" id="btnmessage" name="btnmessage" value="Send Message" class="btn btn-success"> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#btnmessage').click(function(){
        alert("Your Message successfully!!");
      })
      
  </script>
    
    <div id="success" class="modal modal-message fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <i class="ti-close"></i>
            </button>
            <h2>Thank you</h2>
            <p>Your message is successfully sent...</p>
          </div>
        </div>
      </div>
    </div>
    <div id="error" class="modal modal-message fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <i class="ti-close"></i>
            </button>
            <h2>Sorry !</h2>
            <p>Something went wrong</p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
    <!-- ##### Contact Area End ##### -->
@endsection