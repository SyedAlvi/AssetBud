@extends('master')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th> ID</th>
      <th> Name</th>
      <th> image</th>
      <th> Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $data)
    <tr>
      <th>{{$data->id}}</th>
      <th>{{$data->name}}</th>
      <th>{{$data->image}}</th>
      <th>{{$data->status}} </th>
      @if($data->status=='pending')
      <a href="{{route('approve',$data->id)}}" class="btn btn-dark"> Approve</a>    
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection