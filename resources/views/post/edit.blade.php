@extends('welcomehome')
@section('content')
<div class="container-fluid">
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="d-inline">Update Post</h3>
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
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data" class="mb-auto">
          
            @csrf
            @method('PUT')
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label> Name : </label>
                  <input type="text" name="name" class="form-control" value="{{$post->name}}">
                </div>
                <div class="col-md-6">
                  <label for="subject"> Subject : </label>
                  <select class="form-control"  name="subject">
                      <option value="">Choose Subject</option>
                      @foreach($subject as $subject)
                        <option value="{{$subject->id}}" 
                          <?php if ($post->subject_id == $subject->id):?>
                            selected
                          <?php endif; ?>>
                          {{$subject->name}}
                        </option>

                      @endforeach
                    </select>
                </div>
              </div>
            </div>

            <div class="row form-group">

              <div class="col-md-6">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-oldfile-tab" data-toggle="tab" href="#nav-oldfile" role="tab" aria-controls="nav-oldfile" aria-selected="true">Old File </a>
                    
                      <a class="nav-item nav-link" id="nav-newfile-tab" data-toggle="tab" href="#nav-newfile" role="tab" aria-controls="nav-newfile" aria-selected="false">New File </a>
                  </div>
                </nav>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane show active" id="nav-oldfile" role="tabpanel" aria-labelledby="nav-oldfile-tab">

                      <?php
                        $i=1;
                        /*var_dump($filearray);*/
                        foreach($filearray as $file):
                        ?>
                          <p>{{$i}} {{$file}}</p>
                          <input type="hidden" name="oldfilename" value="{{$file}}">
                        <?php  
                          $i++;
                        endforeach;
                        ?>
                      
                        
                    </div>

                    <div class="tab-pane" id="nav-newfile" role="tabpanel" aria-labelledby="nav-newfile-tab">
                      
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
                </div>
              </div>

              <div class="col-md-6">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo </a>
                    
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo </a>
                  </div>
                </nav>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <img src="{{ asset($post->image)}}" width="100">
                      <input type="hidden" name="oldimg" value="{{$post->image}}">
                    </div>

                    <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      
                      <input type="file" name="image" value="$image">
                    
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="t-datepicker mt-3">
                    <div class="t-check-in"></div>
                    <div class="t-check-out"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="description"> Description : </label>
                <textarea class="form-control" name="description" style="height: 110px;">{{$post->description}}</textarea>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                      <label for="name"> Time : </label>
                      <input type="text" name="time" id="time" class="form-control" value="{{$post->time}}">
                  </div>

                  <div class="col-md-12">
                      <label for="name"> Fee : </label>
                      <input type="text" name="fee" id="fee" class="form-control" value="{{$post->fee}}">
                  </div>
                </div>
              </div>
            </div>    
            <div class="form-group">
              <input type="submit" name="btn" class="btn btn-primary float-right mr-2" value="UPDATE">    
            </div>
            
            
        </form>
      </div>
    </div>
</div>
@endsection