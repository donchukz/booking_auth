<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
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
        <form action="{{route('auth.register.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3><small>Become a part of the</small>
                Luxe Tribes!</h3>

            <div class="main-profile-overview" style="text-align: center; margin: auto;">
                <div class="main-img-user profile-user">
                    <img alt="" id="profilePic" src="{{asset('images/6.jpg')}}"><a style="text-decoration: none;" onclick="document.querySelector('.inputFile').click();" class="zmdi zmdi-camera-add profile-edit" href="javascript:void(0);">
                        <input class="inputFile" type="file" name="file" id="pickImg" style="display: none;" />
                    </a>
                </div>
            </div>

            @include('includes.error')

            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Full Name:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account-o"></i>
                        <input id="full_name" name="full_name" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-wrapper">
                    <label for="">DOB:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-time"></i>
                        <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="DOB" value="" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Username:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account-o"></i>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Email:</label>
                    <div class="form-holder">
                        <i style="font-style: normal; font-size: 15px;">@</i>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Nationality:</label>
                    <div class="form-holder select">
                        <select id="nationality" name="nationality" class="form-control" required>
                            <option>-- Select Nationality --</option>
                            @foreach($countries as $country)
                            <option value="{{$country->code}}" @if($country->code == 'gh') selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                        <i class="zmdi zmdi-pin"></i>
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Phone Number:</label>
                    <div class="form-holder">
                        <input type="tel" class="form-control " id="phone" name="phone_number" placeholder="Phone Number" value="" required>
                        <span id="output" class="invalid-feedback"></span>
                        <i class="zmdi zmdi-phone"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Password:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-lock-outline"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Repeat Password:</label>
                    <div class="form-holder">
                        <i class="zmdi zmdi-lock-outline"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="********" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="about" style="height: 120%;" id="about" rows="5" cols="5" class="form-control" placeholder="Tell us about you (optional)"></textarea>
                <span style="float: right; font-weight: bold" id="about_threshold">200</span>
            </div>

            <div class="form-end">
                <div class="checkbox">
                    <p class="text-muted">Already have an account? <a href="{{route('auth.login')}}">Log in</a></p>
                </div>
                <div class="button-holder">
                    <button>Create my account</button>
                </div>

            </div>
        </form>
    </div>
</div>


<!--- JQuery min js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/intlTelInput/js/intlTelInput.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('#profilePic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pickImg").change(function(e){
        readURL(this);
    });

    $(".datepicker").flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d"})

    create_phone_number = window.intlTelInput(document.querySelector("#phone"), {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                let countryCode = (resp && resp.country) ? resp.country : "gh";
                callback(countryCode);
            });
        },
        utilsScript:
            "{{asset('plugins/intlTelInput/js/utils.js')}}",
    });


    $('#about').bind('input propertychange', function() {
        let about_threshold = $('#about_threshold');
        let threshold = (200 - this.value.length);
        about_threshold.html(threshold);
    });

</script>
</body>
</html>
