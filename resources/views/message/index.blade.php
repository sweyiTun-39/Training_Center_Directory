@extends('template')
@section('content')
<div class="container-fluid">
  
    <h3 class="d-inline">Message From Customer</h3>
    
    <hr>
    <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Email</th>
                  <th scope="col" class="text-center">Message</th>
                  <th scope="col" class="text-center">Create_date</th>
                  <th scope="col" class="text-center">Update_date</th>
                </tr>
            </thead>
            <tbody>
              @php
                $i=1;
              @endphp
              @foreach($message as $message)

                <tr>
                  <td scope="row" class="text-center">{{$i}}</td>
                  <td class="text-center">{{$message->name}}</td>
                  <td class="text-center">{{$message->email}}</td>
                  <td class="text-center">{{$message->message}}</td>
                  <td class="text-center">{{$message->created_at}}</td>
                  <td class="text-center">{{$message->updated_at}}</td>
                </tr>
                @php
                  $i++;
                @endphp
                @endforeach

                
            </tbody>
    </table>
</div>

@endsection