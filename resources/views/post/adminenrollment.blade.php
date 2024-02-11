@extends('welcomehome')
@section('content')
<div class="blog-details-content section-padding-100">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-lg-8">
                  <!-- Blog Details Text -->
                  <div class="blog-details-text">
                    <p>
                      <img src="{{$image}}" class="card-img-top w-100" style="width: 200px; height: 350px;">
                    </p>
                   <h2 class="text-center">{{$pname}}</h2>
                   <h3>{{$sname}}</h3>
                   <p class="text-right"><span>Cost</span> {{$fee}}</p>
                   <hr>
                   <p>Enrollment List:</p>

                  
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phoneno</th>
                          <th>Enrollment_Date</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php  
                      $i=1;
                      foreach($enrollmentslist as $enrollment):
                        //if($enrollments->$post_id == $post_id):
                    ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$enrollment->uname}}</td>
                          <td>{{$enrollment->email}}</td>
                          <td>{{$enrollment->phoneno}}</td>
                          <td>{{$enrollment->created_at}}</td>
                        </tr>

                        <?php  
                    $i++;
                 // endif;
                    endforeach;
                  ?>
                      </tbody>
                    </table>
                      <!-- Name : {{$enrollment->uname}}<br>
                      Email : {{$enrollment->email}}<br>
                      Phoneno :{{$enrollment->phoneno}}
                    </p>
                    <hr> -->
                 
                 

                 </div>
                 
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
<!-- <div class="col-md-6 offset-3">
<div class="card h-50">
                 <div class="card-header">
                   <img src="{{$image}}" class="card-img-top" style="height: 300px; width: 200px">
                 </div>
                 <div class="card-body">
                   <h2>{{$pname}}</h2>
                   <h3>{{$sname}}</h3>
                   <p><span>Cost</span> {{$fee}}</p>

                 </div>
                 <?php  
                  $i=1;
                  foreach($enrollments as $enrollment):
                    //if($enrollments->$post_id == $post_id):
                  ?>
                 <div class="card-footer">
                    <p>Enrollment List: <br>
                      Name : {{$enrollment->uname}}<br>
                      Email : {{$enrollment->email}}<br>
                      Phoneno :{{$enrollment->phoneno}}
                    </p>
                 </div>
                 <?php  
                    $i++;
                 // endif;
                    endforeach;
                  ?>
             </div>
             </div> -->
@endsection