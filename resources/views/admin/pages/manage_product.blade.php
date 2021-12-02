@extends('master')
@section('content')
    <div class="Conatiner">
        <h1>Manage Product</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create New Product</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('create.product')}}" class="btn btn-success">Click here for create new product</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Product</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('product.list')}}" class="btn btn-success">Click here for view stock product</a>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection