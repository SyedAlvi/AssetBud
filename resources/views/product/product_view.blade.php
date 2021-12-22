@extends('master')
@section('content')
    <div class="container-xl">
            <div class="card" style="width: 30rem; margin-left: 25%;">
                <div class="card-body">
                  <h5 class="card-title">Product Details</h5>
                  <img src="{{url('/uploads/products/'.$product->image)}}" style="border-radius:4px" height="200px" width="200px" alt="product image">
                  <p><b>Product Name: {{$product->name}}</b></p>
                  <p><b>Product category: {{$product->category}}</b></p>
                  <p><b>Product details: {{$product->details}}</b></p>
                </div>
              </div>
    </div>
@endsection