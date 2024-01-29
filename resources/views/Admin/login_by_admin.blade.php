
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/login/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<style>
    .loginSec {
        display: flex;
        align-items: center;
        background-image: url({{asset('public/login/Malaysia-21.jpg')}});
        padding: 100px 0px;
        background-size: 100% 100%;
        background-blend-mode: overlay;
        background-color: rgb(0 0 0 / 45%);
        height: 100%;
    }

    .loginFormMain {
        background: #ffffff;
        padding: 30px 20px;
        border-radius: 10px;
    }

    .loginFormMain h2 {
        color: rgb(0, 0, 0);
        font-size: 25px;
        margin-bottom: 30px;
        text-align: center;
    }
    .loginFormMain input:focus{
        color: black !important;
    }
    .loginFormMain input {
        width: 320px;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 7px;
        background: #ff000000;
        color: white !important;
        border: 1px solid #00000073;
    }

    .btnLogin button {
        color: white;
        background: #15661e;
        padding: 7px 43px;
        border: unset;
        border-radius: 5px;
        width: 100%;
        font-size: 17px;
        font-weight: 500;
    }

    .btnLogin {
        margin-top: 25px;
        text-align: center;
    }

    .logoLogin {
        text-align: center;
        margin-bottom: 20px;
    }

    .logoLogin img {
        width: 150px;
    }

    .RegisLink {
        display: block;
        color: rgb(0, 0, 0);
        text-align: right;
    }
    form#loginsubAdmin {
    height: 100%;
}
</style>

<body style="height: 100vh;">
  <form id="loginsubAdmin" action="{{url('login_admin')}}" method="post" onsubmit="submitForm()">
    @csrf
    <section class="loginSec">
        <div class="container">
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="loginFormMain">
                            <div class="logoLogin">
                                <img src="{{asset('public/login/smsslogo.png')}}" alt="">
                            </div>
                            <div class="inputdiv" id="errorMessage">
                                @if(session()->has('message'))
                                <p class="alert alert-danger" style="color:red">{{session()->get('message')}}</p>
                                @endif
                            <div>
                            <div>
                                <input type="text" name="email" placeholder="Your Email" />
                            </div>
                            <div>
                                <input type="password" name="password" class="inputtext" placeholder="Your Password" />
                                <span class="RegisLink">Don't have an account? <a href="#"></a>
                                </span>
                            </div>
                            <div class="btnLogin">
                                <button type="submit">Se connecter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <script src="js/bootstrap.bundle.min.js"> </script>
</body>
</html>


