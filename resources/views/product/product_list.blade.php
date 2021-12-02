@extends('master')
@section('content')

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
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection