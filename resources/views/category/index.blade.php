@extends('template')
@section('content')
<div class="container-fluid">
  
    <h3 class="d-inline">Category</h3>
    <a href="{{route('category.create')}}" class="btn btn-info btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add</span>
    </a>
    <hr>
    <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Create_date</th>
                  <th scope="col" class="text-center">Update_date</th>
                  <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
        @php
          $i=1;
        @endphp
        @foreach($category as $category)

                <tr>
                  <td scope="row" class="text-center">{{$i}}</td>
                  <td class="text-center">{{$category->name}}</td>
                  <td class="text-center">{{$category->created_at}}</td>
                  <td class="text-center">{{$category->updated_at}}</td>
                  <td class="text-center">
                      <a href="{{route('category.edit',$category->id)}}"  class="btn btn-warning"><i class="fas fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                      <form method="post"action="{{route('category.destroy',$category->id)}}"class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <input type="submit" name="btn" class="btn btn-danger" value="Delete">

                    </form>
            </td>
                </tr>
          @php
            $i++;
          @endphp
          @endforeach

                
            </tbody>
    </table>
</div>

@endsection