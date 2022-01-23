@extends('master')
@section('content')
<table class="table">
    {{-- <form action="{{route('')}}" method="GET"> --}}
    <thead>
        <h1> my cart ({{session()->has('cart') ? count(session()->get('cart')):0}}) item.</h1>

      <tr>
        <th scope="col">#</th>
        <th scope="col">product name</th>
        <th scope="col">price</th>
        <th scope="col">quantity</th>
        <th scope="col">subtotal</th>
        

    </thead>
    <tbody>
         @if($carts)
    @foreach ($carts as $key=>$data )


      <tr>
        <th scope="row">{{$key}}</th>
        <td>{{$data['product_name']}}</td>
        <td>{{$data['product_price']}}</td>
        <td>{{$data['product_qty']}}</td>
        <td>{{$data['product_price'] * $data['product_qty']}}</td>
        {{-- <td>{{$data['product_price'] * ['$data->product_qty']}}</td> --}}
        
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  <a href="{{route('cart.checkout')}}" class="btn btn-success">Checkout</a>
  <a href="{{route('clear.cart')}}" class="btn btn-danger ">Clear</a>
@endsection