<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v19/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 07:40:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Đăng nhập quản trị </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="{{ asset('login_v19/images/icons/favicon.ico') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/animate/animate.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/css-hamburgers/hamburgers.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/animsition/css/animsition.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/select2/select2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/vendor/daterangepicker/daterangepicker.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_v19/css/main.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Thư viện  --}}
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!--
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <form class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-33">
                Đăng nhập
            </span>
            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input class="input100" type="text" name="email" id="email" placeholder="Email">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
            </div>
            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="pass" id="password" placeholder="Password">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
            </div>
            <div class="container-login100-form-btn m-t-20">
                <button id="btn-submit" class="login100-form-btn">
                    Login
                </button>
            </div>
            {{-- <div class="text-center p-t-45 p-b-4">
                <span class="txt1">
                    Forgot
                </span>
                <a href="login_v19/#" class="txt2 hov1">
                    Username / Password?
                </a>
            </div>
            <div class="text-center">
                <span class="txt1">
                    Create an account?
                </span>
                <a href="login_v19/#" class="txt2 hov1">
                    Sign up
                </a>
            </div> --}}
        </form>
        </div>
    </div>
</div>

<script src="{{ asset('login_v19/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('login_v19/vendor/animsition/js/animsition.min.js') }}"></script>

<script src="{{ asset('login_v19/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('login_v19/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('login_v19/vendor/select2/select2.min.js') }}"></script>

<script src="{{ asset('login_v19/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('login_v19/vendor/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('login_v19/vendor/countdowntime/countdowntime.js') }}"></script>

<script src="{{ asset('') }}"></script>

<script async src="login_v19/https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
<script>
    // ================ AJAX LOGIN FORM=================//
    $(document).ready(function(){
        $("#btn-submit").click(function (e) {
            e.preventDefault();
            //setup ajax
            // alert("oke");
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                'url':'quantri/postLogin',
                'data':{
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                },
                'type':'POST',
                success:function(data){
                    // console.log(data);
                    if(data.error == true){

                        // $('.error').hide();
                        // if(data.message.email != undefined){
                        //     $('.errorEmail').show().text();
                        // }
                        // if(data.message.password != undefined){
                        //     $('.errorPassword').show().text(data.message.password[0]);
                        // }
                        // if(data.message.errorLogin != undefined){
                        //     $('.errorLogin').show().html("<div class='alert alert-danger'>"+data.message
                        //         .errorLogin[0]+"</div>");
                        // }
                        if(data.message.email != undefined){
                            alertify.error(data.message.email[0]);
                        }
                        if(data.message.password != undefined){
                            alertify.error(data.message.password[0]);
                        }
                        if(data.message.errorLogin != undefined){
                            alertify.error(data.message.errorLogin[0]);
                        }

                    }
                    else{
                        window.location.href = "{{asset('/quantri/home')}}";
                    }

                }
            });
        });
    });
</script>
<!-- Mirrored from colorlib.com/etc/lf/Login_v19/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 07:40:18 GMT -->
</html>
