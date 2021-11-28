@extends('master')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th> ID</th>
      <th> Name</th>
      <th> Category</th>
      <th> Details</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productlist as $item)
    <tr>
      <th>{{$item->id}}</th>
      <th>{{$item->name}}</th>
      <th>{{$item->category}}</th>
      <th>{{$item->details}}</th>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection