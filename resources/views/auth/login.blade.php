<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Sistem KPI</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    {{-- <link rel="icon" type="image/png" href="images/icons/favicon.ico" /> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginform/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('back/images/logo-color.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Login Sistem <br>
                        Key Performance Indicator
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember"
                            style="margin-left: 10px">
                        <label class="form-check-label" for="remember" style="margin-left: 10px">Remember Me</label>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                    {{--
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div> --}}

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            <strong>IT-Database</strong>
                        </a>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loginform/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/js/main.js') }}"></script>

</body>

</html>
