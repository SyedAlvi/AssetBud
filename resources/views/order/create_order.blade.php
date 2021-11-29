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
    <form action="{{route('order.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Product Code</label>
        <input type="number" name="id" class="form-control" id="exampleFormControlInput1" placeholder="Product Code">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Name</label>
          <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Product Category</label>
          <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
       
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Product Details</label>
          <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Request for order</button>
      </form>
    </html>
@endsection