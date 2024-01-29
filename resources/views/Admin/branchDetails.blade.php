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

    .sendPos {
        margin-bottom: 20px;
    }

    .cardSpace {
        padding: 30px;
    }
</style>
<div class="container-scroller">
    @include('Admin.layout.header')
    <title>
        Détails de la succursale</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Informations sur la succursale </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tableau de la liste des succursales</li>
                    </ol>
                </nav>
            </div>
            <!-- Student Profile -->
            <div class="student-profile py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent text-center">
                                    <?php if (isset($addSubAdmin)) { ?>
                                        <img class="profile_img" src="{{asset('branch_image')}}/{{$addSubAdmin->branch_image}}" alt="">
                                    <?php } ?>
                                    <h3><?php if (isset($addSubAdmin)) {
                                            echo $addSubAdmin->branch_name;
                                        } ?></h3>
                                </div>
                                <div class="card-body">
                                    <span class="mb-0"><strong class="pr-1">
                                            ID de succursale : </strong><?php if (isset($addSubAdmin)) {
                                                                            echo $addSubAdmin->branch_id;
                                                                        } ?></span>
                                    <br>
                                    <br>
                                    <h6 class="mb-0"><strong class="pr-1">
                                            Étudiante : </strong> {{$totalStudent}}</h6>
                                    <!-- <br>
                                    <h6 class="mb-0"><strong class="pr-1">Section:</strong>A</h6> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Informations sur la succursale</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Identifiant de la succursale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->branch_id;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Nom de la filiale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->branch_name;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">
                                                Nom du gestionnaire</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->first_name . ' ' . $addSubAdmin->last_name;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Code PIN de la succursale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->pincode;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Emplacement de la succursale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->branch_location;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Pays de la succursale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($addSubAdmin)) {
                                                    echo $addSubAdmin->country;
                                                } ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filter_tab(1)">
                        Publication des résultats</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filter_tab(2)">Parents' meeting</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="filter_tab(3)">
                        journal d'appel</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="filter_tab(4)">
                        frais de scolarité</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="filter_tab(5)">
                        Châtiment</button>
                </div>
            </div>
            <!--  Start Result Publication  -->
            <div class="row" style="margin-top:30px;display:none" id="Result_Publication">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body resultPublication">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="card-title">
                                        Publication des résultats</h4>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary sendPos" onclick="window.location.href='{{url("parentMeetingMail")}}'">
                                        Envoyer le message</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <!-- <th>Branch Id</th> -->
                                                <th>
                                                    Nom d'étudiant</th>
                                                <th>
                                                    Classe</th>
                                                <th>Pourcentage</th>
                                                <td>
                                                    lieu occupé</td>
                                                <!--                                             <td>Status</td>
                                            <td>Action</td> -->
                                                <td>SMS</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Publication as $key=>$val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <!-- <td>{{$val->branch_id}}</td> -->
                                                <td>{{$val->child_name}}</td>
                                                <td>{{$val->class}}</td>
                                                <td>{{$val->percentage}}</td>
                                                <td>{{$val->place_occupied}} / {{$totalStudent}}</td>
                                                <td>
                                                    @if($val->mailSend==1)
                                                    <button class="btn btn-success">Success</button>
                                                    @else
                                                    <button class="btn btn-danger">Send</button>
                                                    @endif
                                                </td>
                                                <!--  <td>
                                                @if($val->status==1)
                                                <button class="btn btn-primary">Active</button>
                                                @else
                                                <button>InActive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href=""><i class="mdi mdi-eye"></i></a>
                                                <a href=""><i class="mdi mdi-delete"></i></a>
                                                <a href=""><i class="mdi mdi-rename-box"></i></a>

                                            </td> -->
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--  End Result Publication  -->

            <!--  Start Parents' meeting  -->
            <div class="row" style="margin-top:30px;display:none" id="Parent_Meeting">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="card-title">Parent Meeting</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="branch_list">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>Date</th>
                                                <th>
                                                    Nom d'étudiant</th>
                                                <th>
                                                    Classe </th>
                                                <th>
                                                    taper</th>
                                                <td>participation</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ParentMeeting as $key=>$val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td><?php echo date('d-m-y', strtotime($val->created_at)); ?></td>
                                                <td>{{$val->student_name}}</td>
                                                <td>{{$val->class}}</td>
                                                <td>{{$val->type}}</td>
                                                <td>{{$val->participation}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--  End Parents' meeting  -->

            <!--  Start Call Log -->
            <div class="row" style="margin-top:30px;display:none" id="call_log">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card cardSpace">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title callLog">
                                    Journal d'appel</h4>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="branch_list">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Date</th>
                                        <th>
                                            Nom d'étudiant</th>
                                        <th>
                                            Classe</th>
                                        <th>
                                            présence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($calllog as $key=>$val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><?php echo date('d-m-y', strtotime($val->created_at)); ?></td>
                                        <td>{{$val->student_name}}</td>
                                        <td>{{$val->class}}</td>
                                        <td>{{$val->attendance}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Call Log-->
            <!--  Start School Fees-->
            <div class="row" style="margin-top:30px;display:none" id="school_fees">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">
                                        Frais de scolarité</h4>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger sendPos" onclick="window.location.href='{{url("mailsend_school_fee")}}?id={{base64_encode(1)}}'">
                                        Reste</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary sendPos" onclick="window.location.href='{{url("mailsend_school_fee")}}'">
                                        Dépôt</button>
                                </div>
                                <div class="table-responsive">
                                    <div class="w-50 text-center m-auto" id="mailSuccess" style="display: none;">
                                        <p class="alert alert-success wt-10"><b>Mail envoyé avec succès</b></p>
                                    </div>
                                    <div class="w-50 text-center m-auto" id="mailfail" style="display: none;">
                                        <p class="alert alert-danger wt-10"><b>
                                                Cet étudiant n'a pas enregistré de frais</b></p>
                                    </div>
                                    <table class="table table-bordered" id="branch_list">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>
                                                    Nom d'étudiant</th>
                                                <th>
                                                    Classe</th>
                                                <th>
                                                    Le montant payé</th>
                                                <td>Équilibre</td>
                                                <td>
                                                    Encours</td>
                                                <td>
                                                    Reste</td>
                                                <td>
                                                    Total du reste du courrier</td>
                                                <td>
                                                    Dépôt</td>
                                                <td>Courrier de dépôt total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($SchoolFee as $key=>$val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$val->student_name}}</td>
                                                <td>{{$val->class}}</td>
                                                <td>{{$val->amount_paid}}</td>
                                                <td>{{$val->balance}}</td>
                                                <td>{{$val->outstanding_amount}}</td>
                                                <td>
                                                    <p><b>{{$val->remain}}</b></p>
                                                </td>
                                                <td>
                                                    @if($val->remain==0)
                                                    <button class="btn btn-danger">Remainder</button>
                                                    @else
                                                    <button class="btn btn-success" onclick="return deposit({{$val->id}},'remainder')">
                                                        Renvoyer</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p><b>{{$val->mailSend}}</b></p>
                                                </td>
                                                <td>
                                                    @if($val->mailSend==0)
                                                    <button class="btn btn-waring">Deposit</button>
                                                    @else
                                                    <button class="btn btn-success" onclick="return deposit({{$val->id}},'deposit')">
                                                        Renvoyer</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function deposit(value, name) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('sendMail_schoolFee')}}",
                        data: {
                            studentSelect: value,
                            name: name,
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
            </script>
            <!--  End School Fees-->

            <!--  Start Punishment-->
            <div class="row" style="margin-top:30px;display:none" id="Punishment">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card cardSpace">
                        <div class="col-md-9">
                            <h4 class="card-title callLog">Punishment</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="branch_list">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>nom d'étudiant</th>
                                        <th>
                                            classe</th>
                                        <th>
                                            taper </th>
                                        <th>
                                            Châtiment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($punishment as $key=>$val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->student_name}}</td>
                                        <td>{{$val->class}}</td>
                                        <td>{{$val->type}}</td>
                                        <td>{{$val->punishment}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Punishment-->

            <!--   Punishment-->
        </div>
        <script>
            function filter_tab(id) {
                if (id == 1) {
                    document.getElementById('Punishment').style.display = "none";
                    document.getElementById('school_fees').style.display = "none";
                    document.getElementById('call_log').style.display = "none";
                    document.getElementById('Parent_Meeting').style.display = "none";
                    document.getElementById('Result_Publication').style.display = "block";
                } else if (id == 2) {
                    document.getElementById('Punishment').style.display = "none";
                    document.getElementById('school_fees').style.display = "none";
                    document.getElementById('call_log').style.display = "none";
                    document.getElementById('Parent_Meeting').style.display = "block";
                    document.getElementById('Result_Publication').style.display = "none";
                } else if (id == 3) {
                    document.getElementById('Punishment').style.display = "none";
                    document.getElementById('school_fees').style.display = "none";
                    document.getElementById('call_log').style.display = "block";
                    document.getElementById('Parent_Meeting').style.display = "none";
                    document.getElementById('Result_Publication').style.display = "none";
                } else if (id == 4) {
                    document.getElementById('Punishment').style.display = "none";
                    document.getElementById('school_fees').style.display = "block";
                    document.getElementById('call_log').style.display = "none";
                    document.getElementById('Parent_Meeting').style.display = "none";
                    document.getElementById('Result_Publication').style.display = "none";
                } else if (id == 5) {
                    document.getElementById('Punishment').style.display = "block";
                    document.getElementById('school_fees').style.display = "none";
                    document.getElementById('call_log').style.display = "none";
                    document.getElementById('Parent_Meeting').style.display = "none";
                    document.getElementById('Result_Publication').style.display = "none";
                }
            }
        </script>
        <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
        <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
        <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
        <script>
            $('#branch_list').DataTable();
        </script>
        @include('Admin.layout.footer')