@extends('master')
@section('content')

<div style="overflow-x: scroll">
  <table class="table table-hover table-light" style="width: 100%">
    <thead>
      <tr>
        <th> ID</th>
        <th> Name</th>
        <th> email</th>
        <th> Password</th>
        <th> Address</th>
        <th> Designation</th>
        <th> City</th>
        <th> Mobile</th>
        <th> Employee_image</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employeelist as $key=>$item)
      <tr>
        <th scope="row">{{$key+1}}</th>
        {{-- <th>{{$item->id}}</th> --}}
        <th>{{$item->name}}</th>
        <th>{{$item->email}}</th>
        <th>{{$item->password}}</th>
        <th>{{$item->address}}</th>
        <th>{{$item->category}}</th> 
        <th>{{$item->city}}</th>
        <th>{{$item->mnumber}}</th>
        <td><img src="{{url('/uploads/employees/'.$item->employee_image)}}" style="border-radius: 4px;" width= "100px;" alt="emploee image"> </td>
        <td>
        <a href="{{route('view.employee', $item->id)}}"class="btn btn-info">View</a>
        <a href=""class="btn btn-success">Update</a>
        <a href="{{route('delete.employee', $item->id)}}"class="btn btn-danger">Delete</a> 
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
</div>
  
@endsection