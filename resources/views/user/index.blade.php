@extends('template')
@section('content')
<div class="container-fluid">
  
    <h3 class="d-inline">Partner Lists</h3>
    <!-- <a href="{{route('subject.create')}}" class="btn btn-info btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add</span>
    </a> -->
    <hr>
    <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Center Name</th>
                  <th scope="col" class="text-center">Email</th>
                  <th scope="col" class="text-center">Role</th>
                </tr>
            </thead>
            <tbody>
              @php
                $i=1;
              @endphp
              @foreach($user as $user)

                <tr>
                  <td scope="row" class="text-center">{{$i}}</td>
                  <td class="text-center">{{$user->name}}</td>
                  <td class="text-center">{{$user->centername}}</td>
                  <td class="text-center">{{$user->email}}</td>
                  <td class="text-center">{{$user->role}}</td>
                </tr>
                @php
                  $i++;
                @endphp
                @endforeach

                
            </tbody>
    </table>
</div>

@endsection