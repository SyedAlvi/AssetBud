<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body{
    background-color:#52cdf3;
    font-size:14px;
    color:#fff;
}
.simple-login-container{
    width:400px;
    max-width:100%;
    margin:150px auto;
}
.simple-login-container h2{
    text-align:center;
    font-size:25px;
}

.simple-login-container .btn-login{
    background-color:#FF5964;
    color:#fff;
}
a{
    color:#fff;
}
    </style>

<form id="login-form" class="form" action="{{route('employee.LoginView')}}" method="post">
    @csrf
    <div class="simple-login-container">
        <h2>Employee Login Form</h2>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="email"  name="email" class="form-control" placeholder="Enter your email">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" name="password" placeholder="Enter your Password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <button type="submit" class="btn btn-info">Login</button>
            </div>
        </div>
    </div>
</form>