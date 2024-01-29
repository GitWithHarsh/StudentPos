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
        width: 130px !important;
        font-size: 17px !important;
    }

    .btnSub {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    button.dt-button.buttons-excel.buttons-html5 {
        border: 1px solid #fffdfb8a !important;
    }
</style>

<body>
    <div class="container-scroller">
        @include('Admin.layout.header')
        <title>
            Ajouter un sous-administrateur</title>
        <!-- partial -->
        <div class="main-panel createSubSec">
            <div class="content-wrapper">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                    Tableau de bord</a></li>
                            <li style="cursor: pointer;" class="breadcrumb-item active" aria-current="page" onclick="window.location.href='{{url(" add_class")}}'">Classe</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mainDashHead">
                                    Ajouter une classe</h3>
                                <!-- <h4 class="card-title">Add Class For Student</h4> -->
                                <p style="display: none;" class="alert alert-success" id="classAddSuccess"><b>
                                        Classe ajoutée avec succèsy</b></p>
                                <form class="form-sample mt-5" id="class_add">
                                    @csrf
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Classe</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?php if (isset($addClass)) {
                                                                                                        echo $addClass->add_class;
                                                                                                    } ?>" id="add_class" name="add_class" />
                                                    <input type="hidden" class="form-control" value="<?php if (isset($addClass)) {
                                                                                                            echo $addClass->id;
                                                                                                        } ?>" id="add_class_id" name="add_class_id" />
                                                    <span id="add_classes" style="color: red; display:none">
                                                        Veuillez remplir le nom de la classe</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  btnSub">
                                        <button class="badge badge-success mt-0" type="button" onclick="add_classs()">
                                            Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function add_classs() {
                    let add_class = document.getElementById('add_class').value;
                    if (add_class == "") {
                        document.getElementById('add_classes').style.display = "block";
                        document.getElementById('add_class').scrollIntoView();
                        $('#add_class').focus();
                        return false;
                    } else {
                        $.ajax({
                            type: "post",
                            url: "{{url('save_class')}}",
                            data: new FormData($('#class_add')[0]),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                console.log(data)
                                if ($.trim(data) == "save") {
                                    document.getElementById('add_classes').style.display = "none";
                                    document.getElementById('classAddSuccess').style.display = "block";
                                    setInterval(() => {
                                        window.location.href = '{{url("list_add_class")}}';
                                    }, 1000);
                                } else if ($.trim(data) == "done") {
                                    window.location.href = '{{url("list_add_class")}}';
                                }
                            }
                        });
                    }
                }
            </script>
            @include('Admin.layout.footer')