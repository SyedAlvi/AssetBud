@extends('master')
@section('content')
<h1>Order List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('order.list')}}" method="GET">
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
        <th scope="col">User Name</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key=>$order)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$order->user->name}}</td>
        <td>{{$order->total_price}} .BDT</td>
        <td>

                {{$order->status}}

        </td>
        <td>
          {{-- <a href="{{route('admin.order.approve')}}" class="btn btn-primary">Approve</a> --}}
            @if($order->status!='cancel')
            <a href="{{route('admin.order.cancel',$order->id)}}" class="btn btn-danger">Cancel</a>
            @endif
            
               
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection