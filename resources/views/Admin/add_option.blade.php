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

    button.badge.badge-success.mt-0 {
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
                            <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                    Tableau de bord</a></li>
                            <li style="cursor: pointer;" class="breadcrumb-item active" aria-current="page" onclick="window.location.href='{{url("add_class")}}'">
                                Option</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">

                            <div class="card-body">
                                <h3 class="mainDashHead">
                                    Ajouter une option</h3>
                                <!-- <h4 class="card-title">Add Another Option</h4> -->
                                <form class="form-sample" id="addOption">
                                    @csrf
                                    <div class="row">
                                        <!-- <div class="col-md-10">
                                            <p class="card-description"> Sub Admin Personal Information</p>
                                        </div> -->
                                        <div class="col-md-2">
                                            <?php if (isset($details)) { ?>
                                                <img style="width: 100px; height:100px;margin-bottom: 20px;" src="{{asset('branch_image')}}/{{$details->branch_image}}" alt="yes ">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <p id="save_option" class="alert alert-success" style="display: none;"><b>
                                            Option ajoutée avec succès</b></p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Class</label>
                                                <div class="col-sm-9">
                                                    <select name="className" class="form-control">
                                                        <?php if (isset($option)) { ?>
                                                            <option disabled selected value="<?php if (isset($option)) {
                                                                                                    echo $option->add_class;
                                                                                                } ?>"> <?php if (isset($option)) {
                                                                                                            echo $option->add_class;
                                                                                                        } ?></option>
                                                        <?php } else { ?>
                                                            <option disabled selected>select Class</option>
                                                        <?php } ?>

                                                        @foreach($classList as $val)
                                                        <option value="{{$val->id}}">{{$val->add_class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Option</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php if (isset($option)) {
                                                                                    echo $option->option;
                                                                                } ?>" class="form-control" id="option" name="option" />
                                                    <input type="hidden" value="<?php if (isset($option)) {
                                                                                    echo $option->id;
                                                                                } ?>" class="form-control" id="optionId" name="optionId" />
                                                    <span id="option_data" style="color: red; display:none">
                                                        Veuillez remplir l'option</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  btnSub">
                                        <button class="badge badge-success mt-0" type="button" onclick="return saveOption()">
                                            Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function saveOption() {
                    let option = document.getElementById('option').value;
                    if (option == "") {
                        document.getElementById('option_data').style.display = "block";
                        document.getElementById('option').scrollIntoView();
                        $('#option').focus();
                        return false;
                    } else {
                        $.ajax({
                            type: "post",
                            url: "{{url('save_option')}}",
                            data: new FormData($('#addOption')[0]),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                console.log(data);
                                if ($.trim(data) == "done") {
                                    document.getElementById('option_data').style.display = "none";
                                    document.getElementById('save_option').style.display = "block";
                                    window.location.href = '{{url("option_list")}}'
                                } else if ($.trim(data) == "update") {
                                    window.location.href = '{{url("option_list")}}'
                                }
                            }
                        });
                    }
                }
            </script>
            @include('Admin.layout.footer')