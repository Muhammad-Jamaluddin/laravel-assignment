<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v14/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2023 13:12:15 GMT -->

<head>
    <title> Regiter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css"
        href="{{asset('public/login//fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css"
        href="{{asset('public/login//fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/animate/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//vendor/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/login//css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login//css/main.css')}}">

    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <meta name="robots" content="noindex, follow">

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <form class="login100-form  flex-sb flex-w" action="{{url('auth/store')}}" method="post" id="myForm">
                    @csrf
                    <span class="login100-form-title p-b-32">
                        Account Register
                    </span>
                    <span class="txt1 p-b-11">
                        Username
                    </span>
                    <div class="wrap-input100 validate-input m-b-36">
                        <input class="input100" type="text" value="{{old('name')}}" name="name">

                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <span class="txt1 p-b-11">
                        Email
                    </span>
                    <div class="wrap-input100 validate-input m-b-36">
                        <input class="input100" type="email" value="{{old('email')}}" name="email">

                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <span class="txt1 p-b-11">
                        Phone
                    </span>
                    <div class="wrap-input100 validate-input m-b-36">
                        <input class="input100" type="number" value="{{old('phone')}}" name="phone">

                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" id="password" name="password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <span class="txt1 p-b-11">
                        Confirm Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" id="c_password" name="c_password">

                        <span class="text-danger">@error('c_password') {{ $message }} @enderror</span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                        <a href="{{url('auth/login')}}">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{asset('public/login//vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('public/login//vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{asset('public/login//vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('public/login//vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('public/login//vendor/select2/select2.min.js')}}"></script>

    <script src="{{asset('public/login//vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('public/login//vendor/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('public/login//vendor/countdowntime/countdowntime.js')}}"></script>

    <script src="{{asset('public/login//js/main.js')}}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"803771243dd23e08","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>


</html>