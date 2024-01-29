<style>
    .table {
        height: 100%;
    }

    .student-profile .card {
        border-radius: 10px;
        height: 100%;
    }

    .student-profile .card .card-header .profile_img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 10px auto;
        border: 10px solid #ccc;
        border-radius: 50%;
    }

    .student-profile .card h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .student-profile .card p {
        font-size: 16px;
        color: #000;
    }

    .student-profile .table th,
    .student-profile .table td {
        font-size: 14px;
        padding: 5px 10px;
        color: #e9efe9;
    }

    .resultPublication .card-title {
        margin-bottom: unset !important;

    }

    .sendBtn {
        text-align: right;
    }

    .classlist {
        background-color: #f5eaf4 !important;
    }

    .formSchoolFee {
        background: #191c24;
        padding: 40px;
        border-radius: 5px;
    }

    .formSchoolFee select {
        background: white !important;
    }
</style>
<div class="container-scroller">
    @include('Admin.layout.header')
    <title>Branch List</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Envoyer un mail </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                Tableau de bord</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"></li> -->
                    </ol>
                </nav>
            </div>
            <div class="w-50 text-center m-auto" id="mailSuccess" style="display: none;">
                <p class="alert alert-success wt-10"><b>
                        Mail envoyé avec succès</b></p>
            </div>
            <div class="w-50 text-center m-auto" id="mailfail" style="display: none;">
                <p class="alert alert-danger wt-10"><b>
                        Cet étudiant n'a pas d'enregistrement pour la publication des résultats</b></p>
            </div>
            <div class="formSchoolFee">
                <div>
                    <select id="classId" class="form-control classlist" onchange="selectclass()">
                        <option disabled="disabled" selected="selected" value="select">
                            Veuillez sélectionner la classe</option>
                        @foreach($classList as $val)
                        <option value="{{$val->id}}">{{$val->add_class}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top: 20px;" id="classAddbyStudent">
                    <select id="studentSelect" class="form-control classlist" onchange="selectStudent()">
                        <option selected disabled value="selected">
                            Veuillez sélectionner l'étudiant</option>
                        @foreach($studentRegister as $val)
                        <option value="{{$val->id}}">{{$val->first_name}} {{$val->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top: 20px;" id="fatherName">
                    <select class="form-control classlist" id="fatherName">
                        <option selected disabled>
                            Nom du père</option>
                    </select>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-10">
                        <button class="btn btn-dark" onclick="window.location.href='{{url("total_branch")}}'">Dos</button>
                    </div>
                    <div class=" col-md-2 sendBtn">
                        <button class="btn btn-primary" type="button" onclick="sendMail()">
                            Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function sendMail() {
                let id = 1;
                let classId = document.getElementById('classId').value;
                let studentSelect = document.getElementById('studentSelect').value;
                let fatherName = document.getElementById('fatherName').value;
                if (classId == "select") {
                    $('#classId').focus();
                    return false;
                } else if (studentSelect == "selected") {
                    $('#studentSelect').focus();
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{url('sendMail_schoolFee')}}",
                        data: {
                            id: id,
                            classId: classId,
                            studentSelect: studentSelect,
                            fatherName: fatherName,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        success: function(data) {
                            console.log(data)
                            if ($.trim(data) == "done") {
                                document.getElementById('mailSuccess').style.display = "block";
                                $("#mailSuccess").fadeOut(5000);
                                setTimeout(() => {
                                    window.location.href = '{{url("total_branch")}}';
                                }, 5000);
                            } else if ($.trim(data) == "not") {
                                document.getElementById('mailfail').style.display = "block";
                                $("#mailfail").fadeOut(5000);
                                setTimeout(() => {
                                    window.location.href = '{{url("total_branch")}}';
                                }, 5000);
                            }
                        }
                    });
                }
            }
        </script>
        <script>
            function selectclass() {
                let classId = document.getElementById('classId').value;
                let token = '<?php echo csrf_token(); ?>'
                $.ajax({
                    type: "get",
                    url: "{{url('get_student')}}",
                    data: {
                        id: classId,
                        _token: token
                    },
                    success: function(data) {
                        console.log(data)
                        $('#classAddbyStudent').html(data);
                    }
                });
            }
        </script>
        <script>
            function selectStudent() {
                let classAddbyStudent = document.getElementById('studentSelect').value;
                let token = '<?php echo csrf_token(); ?>'
                $.ajax({
                    type: "get",
                    url: "{{url('get_student')}}",
                    data: {
                        ids: classAddbyStudent,
                        _token: token
                    },
                    success: function(data) {
                        console.log(data)
                        $('#fatherName').html(data)
                    }
                });
            }
        </script>
        <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
        <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
        <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
        <script>
            $('#branch_list').DataTable();
        </script>
        @include('Admin.layout.footer')