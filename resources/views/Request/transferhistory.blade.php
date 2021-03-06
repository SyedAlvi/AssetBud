@extends('master')
@section('content')
<h1>Request List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('transfer.list')}}" method="GET">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
  <input value="" type="text" placeholder="Search" name="search" class="form-control">
</div>
<div class="col-md-4">
  <button type="submit" class="btn btn-success">Search</button>
</div>
</div>
</form>
<style>
  th{
    text-align: center;
  }
</style>
<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $key=>$request)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$request->user->name}}</td>
        <td>{{$request->total_price}} BDT</td>
        <td>

                {{$request->status}}

        </td>
        
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection