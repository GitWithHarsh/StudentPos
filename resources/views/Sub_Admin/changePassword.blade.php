<style>

    / profile end / .mainDiv {

        display: flex;

        min-height: 100%;

        align-items: center;

        justify-content: center;



        font-family: 'Open Sans', sans-serif;

    }



    .mainDiv .cardStyle {

        width: 500px;

        border-color: white;

        background: #fff;

        padding: 36px 0;

        border-radius: 4px;

        margin: 30px 0;

        box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);

    }



    #signupLogo {

        max-height: 100px;

        margin: auto;

        display: flex;

        flex-direction: column;

    }



    .mainDiv .formTitle {

        font-weight: 600;

        margin-top: 20px;

        color: #2F2D3B;

        text-align: center;

    }



    .mainDiv .inputLabel {

        font-size: 16px;

        color: #555;

        margin-bottom: 6px;

        margin-top: 24px;

        font-weight: 600;

    }



    .mainDiv .inputDiv {

        width: 70%;

        display: flex;

        flex-direction: column;

        margin: auto;

    }



    .mainDiv input {

        height: 40px;

        font-size: 16px;

        border-radius: 4px;

        border: none;

        border: solid 1px #ccc;

        padding: 0 11px;

    }



    .mainDiv .buttonWrapper {

        margin-top: 40px;

    }



    .mainDiv .submitButton {

        width: 70%;

        height: 40px;

        margin: auto;

        display: block;

        color: #fff;

        background-color: var(--skyBlue);

        border: none;

        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);

        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);

        border-radius: 4px;

        font-size: 16px;

        font-weight: 600;

        cursor: pointer;

    }



    .changePass {

        background-color: #f5f4f5;

        padding: 50px 0px;

    }



    .cardStyle {

        margin: auto;

        position: relative;

        left: 24%;

    }
    
    .buttonWrapper button {
        background: #cc6601 !important;
        border: unset;
    }

</style>

<div class="container-fluid position-relative d-flex p-0">

    @include('Sub_Admin.layout.header')

    <div class="container-fluid pt-4 px-4">

        <div class="row g-4">

            <div class="col-12">

                <section class="changePass">

                    <div class="container">

                        <div class="row">

                            <div class="mainDiv">

                                <div class="cardStyle">

                                    <form id="changePasswordProfile">

                                        @csrf

                                        <img src="" id="signupLogo">

                                        <h2 class="formTitle">

                                            Changer le mot de passe

                                        </h2>

                                        <div class="inputDiv">

                                            <label class="inputLabel" for="password1">Mot de passe actuel</label>

                                            <input type="password" id="currentPassword" name="currentPassword" required="">

                                        </div>

                                        <div class="text-center">

                                            <span id="profileCurrentPassword" style="color: red;display:none"><b>Votre mot de passe actuel ne correspond pas</b></span>

                                            <span id="profileCurrentPasswordsuccess" style="color: green;display:none"><b>Votre mot de passe a été modifié avec succès</b></span>

                                        </div>

                                        <div class="inputDiv">

                                            <label class="inputLabel" for="password">

                                                Ancien mot de passe</label>

                                            <input type="password" id="presentPassword" name="presentPassword" required="">

                                        </div>

                                        <div class="inputDiv">

                                            <label class="inputLabel" for="confirmPassword">Nouveau mot de passe</label>

                                            <input type="password" id="confirmPassword" name="confirmPassword">

                                            <input type="hidden" name="ProfileId" value="<?php if (isset($branchData)) {

                                                                                                echo

                                                                                                $branchData->id;

                                                                                            } ?>">

                                        </div>

                                        <div class="text-center">

                                            <span id="error" class="mt-10px" style="color: red; display:none">

                                                le mot de passe et la confirmation du mot de passe ne correspondent pas</span>

                                        </div>

                                        <div class="buttonWrapper text-center">

                                            <button type="button" class="btn btn-success" onclick="updatePassword()">Mise à jour</button>

                                        </div>



                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>



            </div>

        </div>

    </div>



    <script>

        function updatePassword() {

            let currentPassword = document.getElementById('currentPassword').value;

            let presentPassword = document.getElementById('presentPassword').value;

            let confirmPassword = document.getElementById('confirmPassword').value;

            if (currentPassword == "") {

                $('#currentPassword').focus();

                $('#currentPassword').css('border', '2px solid red');

                document.getElementById('currentPassword').scrollIntoView();

                return false;

            } else if (presentPassword == "") {

                $('#currentPassword').css('border', '2px solid white');

                $('#presentPassword').focus();

                $('#presentPassword').css('border', '2px solid red');

                document.getElementById('presentPassword').scrollIntoView();

                return false;

            } else if (confirmPassword == "") {

                $('#confirmPassword').focus();

                $('#currentPassword').css('border', '2px solid white');

                $('#presentPassword').css('border', '2px solid white');

                $('#confirmPassword').css('border', '2px solid red');

                document.getElementById('confirmPassword').scrollIntoView();

                return false;

            } else if (presentPassword != confirmPassword) {

                $('#currentPassword').css('border', '2px solid white');

                $('#presentPassword').css('border', '2px solid white');

                $('#confirmPassword').css('border', '2px solid white');

                document.getElementById('error').style.display = "block";

                return false;

            } else {

                $.ajax({

                    type: "post",

                    url: "{{url('profileChangePassword')}}",

                    data: new FormData($('#changePasswordProfile')[0]),

                    contentType: false,

                    processData: false,

                    success: function(data) {

                        console.log(data)

                        if ($.trim(data) == "done") {

                            document.getElementById('profileCurrentPasswordsuccess').style.display = "block";

                            $('#currentPassword').css('border', '2px solid white');

                            $('#presentPassword').css('border', '2px solid white');

                            $('#confirmPassword').css('border', '2px solid white');

                            document.getElementById('error').style.display = "none";

                            document.getElementById('profileCurrentPassword').style.display = "none";

                            document.getElementById('changePasswordProfile').reset();

                        } else if ($.trim(data) == "NotMatch") {

                            $('#currentPassword').css('border', '2px solid white');

                            $('#presentPassword').css('border', '2px solid white');

                            $('#confirmPassword').css('border', '2px solid white');

                            document.getElementById('error').style.display = "none";

                            document.getElementById('profileCurrentPassword').style.display = "block";

                            // document.getElementById('profileCurrentPassword').scrollIntoView();

                        }

                    }

                });

            }

        }

    </script>

    @include('Sub_Admin.layout.footer')