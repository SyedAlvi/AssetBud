@extends('master')


@section('content')
    <h1>category List</h1>

    <a href="{{route('category.list')}}"> </a>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $key=>$category)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$category->Cname}}</td>
                
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
