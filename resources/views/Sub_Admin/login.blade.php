
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
  <form id="loginsubAdmin">
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
                            <div>
                                <input type="text" id="username" name="username" placeholder="branch Id">
                            </div>
                            <div>
                                <input type="password" id="password" name="password" placeholder="Password">
                                <span class="RegisLink">Don't have an account? <a href="#"></a>
                                </span>
                            </div>
                            <div class="btnLogin">
                                <button type="button" onclick="subAdminLogin()">Se connecter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <script src="js/bootstrap.bundle.min.js"> </script>
    <script>
        function subAdminLogin() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            if (username == '') {
                document.getElementById('username').style.border = '2px solid red';
                $('#username').focus();
                return false;
            } else if (password == '') {
                document.getElementById('username').style.border = 'none';
                document.getElementById('password').style.border = '2px solid red';
                $('#password').focus();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{url('subAdminLogin')}}",
                    data: new FormData($('#loginsubAdmin')[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if ($.trim(data) == "done") {
                            window.location.href = "{{url('sub_index')}}";
                        } else if ($.trim(data) == "branchId") {
                            document.getElementById('branchIdExit').style.display = 'block';
                        } else if ($.trim(data) == "not") {
                            document.getElementById('branchIdExit').style.display = 'none';
                            document.getElementById('passwordId').style.display = 'block';
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>

