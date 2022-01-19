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

    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class= "form-group">
        <label for="exampleFormControlInput1">Product Code</label>
        <input type="number" name="id" class="form-control" id="exampleFormControlInput1" placeholder="Product Code">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Name</label>
          <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Product Category</label>
          <select name="Cname" class="form-control" id="exampleFormControlSelect1">
            @foreach ($categories as $category)
            <option value="{{$category->Cname}}">{{$category->Cname}}</option>
         @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Quantity</label>
          <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Product quantity">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"> Product price</label>
          <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Product price">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Product Details</label>
          <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Image</label>
          <input name="product_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
        <button type="submit" class="btn btn-primary">Create New Product</button>
      </form>
    </html>
@endsection