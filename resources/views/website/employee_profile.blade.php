
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>


<div >
    <table style="width: 100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>email</th>
          <th>Address</th>
          <th>Designation</th>
          <th>City</th>
          <th>Mobile</th>
          <th>Employee_image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $item)
        <tr>
          <th>{{$item->name}}</th>
          <th>{{$item->email}}</th>
          <th>{{$item->address}}</th>
          <th>{{$item->category}}</th> 
          <th>{{$item->city}}</th>
          <th>{{$item->mnumber}}</th>
          <td><img src="{{url('/uploads/users/'.$item->image)}}" style="border-radius: 4px;" width= "100px;" alt="emploee image"> </td>
          <td>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </div>
</html>