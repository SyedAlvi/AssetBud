@extends('master')
@section('content')

<h1>Product List</h1>
    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif
<form action="{{route('product.list')}}" method="GET">
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
      <th> Quantity</th>
      <th> Details</th>
      <th> Product_image</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productlist as $item)
    <tr>
      <th>{{$item->id}}</th>
      <th>{{$item->name}}</th>
      <th>{{$item->category}}</th>
      <th>{{$item->quantity}}</th>
      <th>{{$item->details}}</th>
      <td><img src="{{url('/uploads/products/'.$item->image)}}" style="border-radius: 4px;" width= "100px;" alt="product image"> </td>
      <td>
        <a href="{{route('view.product', $item->id)}}"class="btn btn-info">View</a>
        <a href="{{route('product.edit',$item->id)}}"class="btn btn-success">Update</a>
        <a href="{{route('delete.product', $item->id)}}"class="btn btn-danger">Delete</a> 
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection