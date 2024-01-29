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
                                    ajouter des frais</h3>
                                <span style="display: none;" id="amountAdd" class="form-control alert alert-success text-center">Success</span>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Class</label>
                                                <div class="col-sm-9">
                                                    <select id="selectClassByFee" class="form-control" onchange="selectClass()">
                                                        <?php
                                                        if (isset($ClassDetails)) { ?>
                                                            <option disabled selected>{{$ClassDetails->ClassName}}</option>
                                                        <?php } else { ?>
                                                            <option disabled selected>Select Class</option>
                                                        <?php } ?>

                                                        ?>
                                                        @foreach($Class as $val)
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
                                                    <select class="form-control" id="SelectOption">
                                                        <?php
                                                        if (isset($ClassDetails)) { ?>
                                                            <option disabled selected>{{$ClassDetails->option}}</option>
                                                        <?php } else { ?>
                                                            <option disabled selected>Select Option</option>
                                                        <?php } ?>

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="Amount" class="form-control" <?php if (isset($ClassDetails)) {
                                                                                                            echo "readonly";
                                                                                                        } ?> value="<?php if (isset($ClassDetails)) {
                                                                                                                        echo $ClassDetails->SchoolFee;
                                                                                                                    } ?>">
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
                function selectClass() {
                    let selectClass = document.getElementById('selectClassByFee').value;
                    $.ajax({
                        type: "POST",
                        url: "{{url('filterSchoolFee')}}",
                        data: {
                            selectClass: selectClass,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        success: function(data) {
                            console.log(data)
                            $('#SelectOption').html(data)
                        }

                    });
                }
            </script>
            <script>
                function saveOption() {
                    let selectClassByFee = document.getElementById('selectClassByFee').value;
                    let SelectOption = document.getElementById('SelectOption').value;
                    let Amount = document.getElementById('Amount').value;
                    if (selectClassByFee == "Select Class") {
                        $('#selectClassByFee').css('border', '2px solid red');
                        $('#selectClassByFee').focus();
                        return false;
                    } else if (SelectOption == "Select Option") {
                        $('#SelectOption').css('border', '2px solid red');
                        $('#SelectOption').focus();
                        return false;
                    } else if (Amount == "") {
                        $('#Amount').css('border', '2px solid red');
                        $('#Amount').focus();
                        return false;
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "{{url('filterSchoolFee')}}",
                            data: {
                                selectClassByFee: selectClassByFee,
                                SelectOption: SelectOption,
                                Amount: Amount,
                                _token: '<?php echo csrf_token(); ?>'
                            },
                            success: function(data) {
                                console.log(data)
                                if ($.trim(data) == "done") {

                                    $("#amountAdd").fadeIn(1000);
                                    setInterval(() => {
                                        window.location.href = '{{url("AddSchoolFee")}}'
                                    }, 3000);
                                }
                            }
                        });
                    }
                }
            </script>
            @include('Admin.layout.footer')