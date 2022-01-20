@extends('master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    @if(session()->has('success'))
    <p class="alert alert-success">
      {{session()->get('success')}}
    </p>
@endif

@if ($errors->any())
<div class="alert alert-warning" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>   
    @endforeach
  </ul>
</div>
@endif
<img style="border-radius: 4px;" width="500px;" src="{{url('/uploads/products/'.$product->image)}}" alt="product">
    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class= "form-group">
        <label for="exampleFormControlInput1">Product Code</label>
        <input value="{{$product->id}}" type="number" name="id" class="form-control" id="exampleFormControlInput1" placeholder="Product Code">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Name</label>
          <input value="{{$product->name}}" type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
        </div>
        
       
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Quantity</label>
          <input value="{{$product->quantity}}" type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Product quantity">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Price</label>
          <input value="{{$product->price}}" type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Product Details</label>
          {{-- <textarea  value="{{$product->details}}" name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
          <input value="{{$product->details}}" type="text" name="details" class="form-control" id="exampleFormControlInput1" placeholder="details">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Image</label>
          <input value="{{url('/uploads/products/'.$product->image)}}" name="product_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
        <button type="submit" class="btn btn-primary">submit</button>
      </form>
    </html>
@endsection