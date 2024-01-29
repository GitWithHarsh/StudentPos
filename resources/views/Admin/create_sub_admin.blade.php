<style>
    .createSubSec h3 {
        color: black;
    }

    input {
        color: #ffffffab;
    }

    .row.btnSub {
        margin-top: 20px;
    }

    .page-header {
        margin-bottom: 10px !important;
    }

    .badge.badge-success.mt-0 {
        background: #cc6601;
        border: unset;
        padding: 10px 25px;
        width: 130px;
        font-size: 17px;
    }

    .btnSub {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .form-control:focus {
        color: white !important;
    }

    .form-group {
        color: white;
    }

    label.label-checkbox100 {
        color: black;
        font-weight: 600;
    }
</style>

<body>
    <div class="container-scroller">
        @include('Admin.layout.header')
        <title>Ajouter un sous-administrateur</title>
        <!-- partial -->
        <div class="main-panel createSubSec">
            <div class="content-wrapper">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Home')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h3 class=" mainDashHead">Créer un profil de sous-administrateur</h3>
                                <form class="form-sample mt-5" id="branchCreate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <?php if (isset($details)) { ?>
                                                <img style="width: 100px; height:100px;margin-bottom: 20px;" src="{{asset('branch_image')}}/{{$details->branch_image}}" alt="yes ">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <p class="alert alert-success" style="display: none;" id="createBranch"><b>Branch Successfully created</b></p>
                                    <p class="alert alert-success" style="display: none;" id="updateBranch"><b>Branch Successfully updated</b></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Prénom du gérant</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php if (isset($details)) {
                                                                                    echo $details->first_name;
                                                                                } ?>" class="form-control" id="name" name="first_name" />
                                                    <span id="fistName" style="color: red; display:none">
                                                        Merci de renseigner le prénom</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nom du responsable</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php if (isset($details)) {
                                                                                    echo $details->last_name;
                                                                                } ?>" name="last_name" id="last" class="form-control" />
                                                    <span id="lastName" style="color: red; display:none">Veuillez
                                                        remplir le nom de famille</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Genre</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="Gender" name="gender">
                                                        <?php if (isset($details)) { ?>
                                                            <option selected="selected" value="<?php if (isset($details)) {
                                                                                                    echo $details->gender;
                                                                                                } ?>">
                                                                <?php if (isset($details)) {
                                                                    echo $details->gender;
                                                                } ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option selected disabled>select Gender
                                                            </option>

                                                        <?php } ?>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Femelle</option>
                                                    </select>
                                                    <span id="genderName" style="color: red; display:none">Please fill
                                                        Gender</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">
                                                    Image de la branche</label>
                                                <div class="col-sm-9">
                                                    <input type="file" id="branch_image" name="branch_name" accept="image/*" class="form-control" />
                                                    <span id="imageBranch" style="color: red; display:none">
                                                        Veuillez sélectionner l'image</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <p class="card-description"> Address </p> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nom de la filiale</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="branch_name" value="<?php if (isset($details)) {
                                                                                                    echo $details->branch_name;
                                                                                                } ?>" name="branch_names" class="form-control" />
                                                    <span id="branchName" style="color: red; display:none">Veuillez
                                                        indiquer le nom de la succursale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Localisation de la
                                                    succursale..</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="branch_location" value="<?php if (isset($details)) {
                                                                                                        echo $details->branch_location;
                                                                                                    } ?>" name="branch_location" class="form-control" />
                                                    <span id="branchLocation" style="color: red; display:none">
                                                        Veuillez indiquer l'emplacement de la succursale</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">
                                                    État</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="State" value="<?php if (isset($details)) {
                                                                                                echo $details->state;
                                                                                            } ?>" name="state" class="form-control" />
                                                    <span id="branchstate" style="color: red; display:none">Veuillez
                                                        donner le nom de l'État</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">mot de passe</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="pincode" value="<?php if (isset($details)) {
                                                                                                echo $details->pincode;
                                                                                            } ?>" name="pincode" class="form-control" />
                                                    <span id="branchpincode" style="color: red; display:none">Merci de
                                                        donner le code PIN</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Ville</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="City" value="<?php if (isset($details)) {
                                                                                            echo $details->city;
                                                                                        } ?>" name="city" class="form-control" />
                                                    <span id="branchCity" style="color: red; display:none">Veuillez
                                                        donner le nom de la ville</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">
                                                    Pays</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="country" value="<?php if (isset($details)) {
                                                                                                echo $details->country;
                                                                                            } ?>" name="country" class="form-control" />
                                                    <input type="hidden" value="<?php if (isset($details)) {
                                                                                    echo $details->id;
                                                                                } ?>" name="id" class="form-control" />
                                                    <input type="hidden" value="<?php if (isset($details)) {
                                                                                    echo $details->branch_image;
                                                                                } ?>" name="branch_image" class="form-control" />
                                                    <span id="branchCountry" style="color: red; display:none">
                                                        Veuillez donner le nom du pays</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  btnSub">
                                        <button class="badge badge-success mt-0" type="button" onclick="return branch_register()">
                                            Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function branch_register() {
                    let name = document.getElementById('name').value;
                    let last = document.getElementById('last').value;
                    let Gender = document.getElementById('Gender').value;
                    let branch_image = document.getElementById('branch_image').value;
                    let branch_name = document.getElementById('branch_name').value;
                    let branch_location = document.getElementById('branch_location').value;
                    let State = document.getElementById('State').value;
                    let pincode = document.getElementById('pincode').value;
                    let City = document.getElementById('City').value;
                    let country = document.getElementById('country').value;
                    if (name == "") {
                        document.getElementById('fistName').style.display = "block";
                        $('#name').focus();
                        document.getElementById("fistName").scrollIntoView();
                        return false;
                    } else if (last == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "block";
                        $('#last').focus();
                        document.getElementById('lastName').scrollIntoView();
                        return false;
                    } else if (Gender == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "block";
                        document.getElementById('genderName').scrollIntoView();
                        $('#Gender').focus();
                        return false;
                        <?php if (!$details || !isset($details)) { ?>
                    } else if (branch_image == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "block";
                        document.getElementById('imageBranch').scrollIntoView();
                        $('#branch_image').focus();
                        return false;
                    <?php } ?>
                    } else if (branch_name == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "block";
                        document.getElementById('branch_name').scrollIntoView();
                        return false;
                    } else if (branch_location == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "none";
                        document.getElementById('branchLocation').style.display = "block";
                        document.getElementById('branchLocation').scrollIntoView();
                        $('#branch_location').focus();
                        return false;
                    } else if (State == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "none";
                        document.getElementById('branchLocation').style.display = "none";
                        document.getElementById('branchstate').style.display = "block";
                        document.getElementById('branchstate').scrollIntoView();
                        $('#State').focus();
                        return false;
                    } else if (pincode == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "none";
                        document.getElementById('branchLocation').style.display = "none";
                        document.getElementById('branchstate').style.display = "none";
                        document.getElementById('branchpincode').style.display = "block";
                        document.getElementById('branchpincode').scrollIntoView();
                        $('#pincode').focus();
                        return false;
                    } else if (City == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "none";
                        document.getElementById('branchLocation').style.display = "none";
                        document.getElementById('branchstate').style.display = "none";
                        document.getElementById('branchpincode').style.display = "none";
                        document.getElementById('branchCity').style.display = "block"
                        document.getElementById('branchCity').scrollIntoView();
                        $('#City').focus();
                        return false;
                    } else if (country == "") {
                        document.getElementById('fistName').style.display = "none";
                        document.getElementById('lastName').style.display = "none";
                        document.getElementById('genderName').style.display = "none";
                        document.getElementById('imageBranch').style.display = "none";
                        document.getElementById('branchName').style.display = "none";
                        document.getElementById('branchLocation').style.display = "none";
                        document.getElementById('branchstate').style.display = "none";
                        document.getElementById('branchpincode').style.display = "none";
                        document.getElementById('branchCity').style.display = "none";
                        document.getElementById('branchCountry').scrollIntoView();
                        $('#country').focus();
                        return false;
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "{{url('add_sub_admin')}}",
                            data: new FormData($('#branchCreate')[0]),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                console.log(data);
                                if ($.trim(data) == "create") {
                                    $('#createBranch').fadeIn('2000');
                                    document.getElementById('createBranch').scrollIntoView();
                                    setInterval(() => {
                                        window.location.href = '{{url("total_branch")}}'
                                    }, 2000);
                                } else if ($.trim(data) == "update") {
                                    $('#updateBranch').fadeIn('2000');
                                    document.getElementById('updateBranch').scrollIntoView();
                                    setInterval(() => {
                                        window.location.href = '{{url("total_branch")}}'
                                    }, 2000);
                                }
                            }


                        });
                    }
                }
            </script>
            @include('Admin.layout.footer')