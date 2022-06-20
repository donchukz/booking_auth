<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{asset('plugins/intlTelInput/css/intlTelInput.css')}}" rel="stylesheet">


</head>

<body>

<div class="wrapper" style="background-image: url({{asset('images/bg-registration-form-3.jpg')}});">
    <div class="inner">
        <form action="{{route('auth.login')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Welcome Back!</h3>

            @include('includes.error')


            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Username:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account-o"></i>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Password:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-lock-outline"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                    </div>
                </div>
            </div>



            <div class="form-end">
                <div class="checkbox">
                    <p class="text-muted">Don't have an account? <a href="{{route('auth.register')}}">Register</a></p>
                </div>
                <div class="button-holder">
                    <button>Login</button>
                </div>

            </div>
        </form>
    </div>
</div>


<!--- JQuery min js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

</body>
</html>
