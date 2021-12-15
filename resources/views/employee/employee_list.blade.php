@extends('master')
@section('content')

<table class="table">
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
    @foreach ($employeelist as $item)
    <tr>
      <th>{{$item->id}}</th>
      <th>{{$item->name}}</th>
      <th>{{$item->email}}</th>
      <th>{{$item->password}}</th>
      <th>{{$item->address}}</th>
      <th>{{$item->category}}</th> 
      <th>{{$item->city}}</th>
      <th>{{$item->mnumber}}</th>
      <td><img src="{{url('/uploads/employees/'.$item->employee_image)}}" style="border-radius: 4px;" width= "500px;" alt="emploee image"> </td>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection