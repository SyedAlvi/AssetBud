<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <table class="table">
        <thead>
          <tr>
            <th> ID</th>
            <th> Name</th>
            <th> Category</th>
            
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
            
            <th>{{$item->details}}</th>
            <td><img src="{{url('/uploads/products/'.$item->image)}}" style="border-radius: 4px;" width= "100px;" alt="product image"> </td>
            <td>
              <a href="{{route('product.view', $item->id)}}"class="btn btn-info">View</a>
              
              </td>
          </tr>
          @endforeach
        </tbody>
        </table>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>