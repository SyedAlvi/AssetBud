{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<div class="container-xl">
            <div class="card" style="width: 30rem; margin-left: 25%;">
                <div class="card-body">
                  <h5 class="card-title">Employee Details</h5>
                  @foreach ($employee_id as $item)
                  <img src="{{url('/uploads/items/'. $item->image)}}" style="border-radius:4px" height="200px" width="200px" alt="employee image">
                  <p><b>Employee Name: {{$item->name}}</b></p>
                  <p><b>Employee Email: {{$item->email}}</b></p>
                  <p><b>Employee Address: {{$item->address}}</b></p>
                  <p><b>Employee Number: {{$item->mnumber}}</b></p>
                      
                  @endforeach
                  
                </div>
              </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </div>
</html> --}}