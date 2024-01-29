<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/chnagePassword/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/chnagePassword/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/chnagePassword/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/chnagePassword/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/chnagePassword/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/chnagePassword/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<style>
    .login100-form-title {
        padding: 20px 15px 20px 15px;
        background: white !important;
    }

    .login100-form-title::before {
        border-radius: 10px;
        background-color: white;
    }

    .login100-form-title-1 {
        color: #006500;
        font-weight: 500 !important;
        font-family: unset !important;
    }

    .container-login100 {
        background: white;
    }

    .login100-form span {
        color: black;
        font-weight: 400 !important;
    }

    form#chnagePasswordSave {
        background: white;
    }

    .wrap-login100 {
        width: 100%;
        background: white !important;
    }

    .container-login100 {
        min-height: unset !important;
    }

    .login100-form-btn {
        background: #f99734 !important;
    }

    #chnagePasswordSave input {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #cc6601;
    }

    #chnagePasswordSave input:focus {
        border: 1px solid #cc6601;
        background: white !important;

    }

    #chnagePasswordSave input:visited {
        border: 1px solid #cc6601;
        background: white !important;

    }

    .input100 {
        background: #ffffff !important;
    }

    label.label-checkbox100 {
        color: black !important;
        font-weight: 600 !important;
    }
</style>

<body>
    <div class="container-scroller">
        @include('Admin.layout.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100">
                                <div class="login100-form-title"
                                    style="background-image: url({{asset('public/chnagePassword/images/loginBg.jpg')}});">
                                    <span class="login100-form-title-1">
                                        Changer le mot de passe
                                    </span>
                                </div>
                                <form class="login100-form validate-form" id="chnagePasswordSave">
                                    @csrf
                                    <div class="wrap-input100 validate-input m-b-26"
                                        data-validate="Username is required">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <span class="label-input100"><b>Mot de passe actuel</b></span>
                                            </div>
                                            <div class="col-8">
                                                <input class="input100" type="text" name="current_password"
                                                    id="current_password" placeholder="current password">
                                                <span class="focus-input100"></span>
                                                <p id="currentPass" style="display: none; color:red">
                                                    Votre mot de passe actuel ne correspond pas</p>
                                                <p id="currentPassnull" style="display: none; color:red">Votre mot de
                                                    passe actuel est nul</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-18"
                                        data-validate="Password is required">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <span class="label-input100"><b>
                                                        Mot de passe</b></span>
                                            </div>
                                            <div class="col-8">
                                                <input class="input100" type="password" name="password" id="password"
                                                    placeholder="password">
                                                <span class="focus-input100"></span>
                                                <p id="latestPassword" style="display: none; color:red">Votre mot de
                                                    passe est vide</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-18"
                                        data-validate="Password is required">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <span class="label-input100"><b>Confirmez le mot de passe</b></span>
                                            </div>
                                            <div class="col-8">
                                                <input class="input100" type="password" id="confirmPass"
                                                    name="confirm_password" placeholder="confirm password">
                                                <span class="focus-input100"></span>
                                                <p id="confirm_password" style="display: none; color:red">Votre mot de
                                                    passe actuel est vide</p>
                                                <p id="currentPassnotmatch" style="display: none; color:red">Votre mot
                                                    de passe actuel et votre mot de passe ne correspondent pas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-sb-m w-full p-b-30">
                                        <div class="contact100-form-checkbox">
                                            <input class="input-checkbox100" class="checkeds" id="ckb1" type="checkbox"
                                                name="remember-me">
                                            <label class="label-checkbox100" for="ckb1">
                                                Souviens-toi de moi
                                            </label>
                                        </div>
                                        <!-- <div>
                                            <a href="#" class="txt1">
                                                Forgot Password?
                                            </a>
                                        </div> -->
                                    </div>
                                    <div class="container-login100-form-btn">
                                        <button type="button" class="login100-form-btn"
                                            onclick="return changePassword()">
                                            Changer le mot de passe
                                        </button>
                                        <input type="hidden" id="checckboxValue" name="checckboxValue">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function changePassword() {
                    let checked = document.querySelector('#ckb1').checked;
                    document.getElementById('checckboxValue').value = checked;
                    let current = document.getElementById('current_password').value;
                    let password = document.getElementById('password').value;
                    let confirmPass = document.getElementById('confirmPass').value;
                    if (current == "") {
                        document.getElementById('currentPassnull').style.display = 'block';
                        return false;
                    } else if (password == "") {
                        document.getElementById('currentPassnull').style.display = 'none';
                        document.getElementById('latestPassword').style.display = "block";
                        return false;
                    } else if (confirmPass == "") {
                        document.getElementById('currentPassnull').style.display = 'none';
                        document.getElementById('latestPassword').style.display = "none";
                        document.getElementById('confirm_password').style.display = "block";
                        return false
                    } else if (password != confirmPass) {
                        document.getElementById('currentPassnull').style.display = 'none';
                        document.getElementById('latestPassword').style.display = "none";
                        document.getElementById('confirm_password').style.display = "none";
                        document.getElementById('currentPassnotmatch').style.display = 'block';
                        return false;
                    }
                    $.ajax({
                        type: "POST",
                        url: "{{url('changePasswordSuccess')}}",
                        data: new FormData($('#chnagePasswordSave')[0]),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            if ($.trim(data) == "Done") {
                                window.location.href = "{{url('Home')}}";
                            } else if ($.trim(data) == "currentPasswordNotMatch") {
                                document.getElementById('currentPass').style.display = "block";
                                document.getElementById('currentPassnull').style.display = 'none';
                                document.getElementById('latestPassword').style.display = "none";
                                document.getElementById('confirm_password').style.display = "none";
                                document.getElementById('currentPassnotmatch').style.display = 'none';
                            }
                        }
                    });
                }
            </script>
            @include('Admin.layout.footer')