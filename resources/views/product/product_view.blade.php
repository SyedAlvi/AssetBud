@extends('master')
@section('content')
    <div class="container-xl">
            <div class="card" style="width: 30rem; margin-left: 25%;">
                <div class="card-body">
                  <h5 class="card-title">Product Details</h5>
                  <img src="{{url('/uploads/products/'.$productlist->image)}}" style="border-radius:4px" height="200px" width="200px" alt="product image">
                  <p><b>Product Name: {{$productlist->name}}</b></p>
                  <p><b>Product category: {{$productlist->Cname}}</b></p>
                  <p><b>Product details: {{$productlist->details}}</b></p>
                </div>
                <a href="{{route('new.cart',$productlist->id)}}" class="btn btn-success">add to cart</a> 
              </div>
    </div>
@endsection