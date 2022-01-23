@extends('master')
@section('content')

<h1>Product List</h1>
    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif
<form action="{{route('product.cart')}}" method="GET">
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
  
<table class="table">
  <thead>
    <tr>
      <th> ID</th>
      <th> Name</th>
      <th> Category</th>
      
      <th> Price</th>
      <th> Details</th>
      
      <th> Product_image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productlist as $product)
    <tr>
      <th>{{ $product->id}}</th>
      <th>{{ $product->name}}</th>
      <th>{{$product->Cname}}</th>
      
      <th>{{ $product->price}}</th>
      <th>{{ $product->details}}</th>
      <td><img src="{{url('/uploads/products/'. $product->image)}}" style="border-radius: 4px;" width= "100px;" alt="product image"> </td>
      
      <td>
        <a href="{{route('view.product',  $product->id)}}"class="btn btn-info">View</a>
       
        <a href="{{route('new.cart',$product->id)}}" class="btn btn-success">add to cart</a> 
        {{-- <a href= class="btn">Add to Cart</a> --}}
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection