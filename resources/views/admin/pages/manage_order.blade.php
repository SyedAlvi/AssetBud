@extends('master')
@section('content')
    <div class="Conatiner">
        <h1>Manage Order</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Request for order</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('')}}" class="btn btn-success">Click here for request for order</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Order</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('')}}" class="btn btn-success">Click here for view order</a>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection