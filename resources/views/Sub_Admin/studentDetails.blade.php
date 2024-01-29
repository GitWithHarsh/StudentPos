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

    .card-body.pt-0 {
        color: black;
        background-color: #5a8764;
    }

    .table {
        --bs-table-bg: rgba(0, 0, 0, 0);
        --bs-table-striped-color: #6C7293;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #6C7293;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #6C7293;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #6C7293;
        vertical-align: top;
        border-color: #fff !important;
    }

    .card.shadow-sm {
        background-color: #5a8764;
    }

    .student-profile .card {
        border-radius: 10px;
        height: 55%;
    }

    .student-profile .table th,
    .student-profile .table td {
        font-size: 14px;
        padding: 11px 10px;
        color: #e9efe9;
    }

    strong.pr-1 {
        color: white;
    }

    .allbuttons {
        margin-bottom: 5%;
    }

    .allbuttons button {
        background: #cc6601;
        border: unset;
    }

    .detailslet {
        text-align: center;
        padding: 10px
    }

    button.btn.btn-info.sendMail {
        margin: -15px 0px 0px 51px;
    }

    .modal-header {
        border-bottom: unset !important;
    }

    .modal-footer {
        border-top: unset !important;
    }

    * {
        margin: 0;
        padding: 0;
    }

    html,
    body {
        height: 100vh;
        width: 100vw;
        background-color: #151515;
    }

    .switch-button {
        width: 219px;
        height: 42px;
        text-align: center;
        position: absolute;
        left: 76%;
        border-radius: 2px solid red;
        border: 75px;
        top: 43%;
        transform: translate3D(-50%, -50%, 0);
        will-change: transform;
        z-index: 197 !important;
        cursor: pointer;
        transition: 0.3s ease all;
        border: 2px solid white;
    }

    .switch-button-case {
        display: inline-block;
        background: none;
        width: 49%;
        height: 100%;
        color: #423944;
        position: relative;
        border: none;
        transition: 0.3s ease all;
        text-transform: uppercase;
        letter-spacing: 5px;
        padding-bottom: 1px;
    }

    .switch-button-case:hover {
        color: #23a386;
        cursor: pointer;
    }

    .switch-button-case:focus {
        outline: none;
    }

    .switch-button .active {
        color: #23a386;
        background-color: #192020;
        position: absolute;
        left: 0;
        top: 0;
        width: 50%;
        height: 100%;
        z-index: -1;
        transition: 0.3s ease-out all;
    }

    .switch-button .active-case {
        color: #23a386;
    }

    .signature {
        position: fixed;
        font-family: sans-serif;
        font-weight: 100;
        bottom: 10px;
        left: 0;
        letter-spacing: 4px;
        font-size: 10px;
        width: 100vw;
        text-align: center;
        color: white;
        text-transform: uppercase;
        text-decoration: none;
    }

    .CallDate {
        position: relative;
        bottom: 30px;
        margin: 0px 0px -28px 0px;
    }

    .col-md-6 {
        flex: 0 0 auto;
        width: 48% !important;
    }
</style>
<div class="container-scroller">
    @include('Sub_Admin.layout.header')
    <title>
        liste des étudiants</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Informations sur les étudiants</h3>
                <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Branch List Table</li>
                    </ol>
                </nav> -->
            </div>
            <!-- Student Profile -->
            <div class="student-profile py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent text-center">
                                    <?php if (isset($studentRegister)) { ?>
                                        <img class="profile_img" src="http://localhost/SMSS/branch_image/1704277108.jpg" alt="">
                                    <?php } else { ?>
                                        <img class="profile_img" src="http://localhost/SMSS/branch_image/1704277108.jpg" alt="">
                                    <?php } ?>
                                    <h3><?php if (isset($addSubAdmin)) {
                                            echo $addSubAdmin->branch_name;
                                        } ?></h3>
                                </div>
                                <div class="card-body">
                                    <span class="mb-0"><strong class="pr-1">ID de succursale :<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->branch_id;
                                                                                                } ?> </strong></span>
                                    <br>
                                    <br>
                                    <h6 class="mb-0"><strong class="pr-1">
                                            Carte d'étudiant : <?php if (isset($studentRegister)) {
                                                                    echo $studentRegister->student_image;
                                                                } ?></strong> </h6>
                                    <input type="hidden" id="everyId" value="<?php if (isset($studentRegister)) {
                                                                                    echo $studentRegister->student_image;
                                                                                } ?>">
                                    <!-- <br>
                                    <h6 class="mb-0"><strong class="pr-1">Section:</strong>A</h6> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <div>
                                        <h3 class="mb-0 detailslet">Détails de l'étudiant</h3>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="40%">Identifiant de la succursale</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->branch_id;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Classe d'étudiant</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->first_name;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Nom d'étudiant</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->first_name . ' ' . $studentRegister->last_name;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Message étudiant</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->post_name;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Age</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->age;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">E-mail</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->email;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">lieu</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->place;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">DOB</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->date_of_birth;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Père</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->father;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Mère</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->mother;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Téléphone</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->telephone;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Mobile</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->mobile;
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Année scolaire</th>
                                            <td width="2%">:</td>
                                            <td><?php if (isset($studentRegister)) {
                                                    echo $studentRegister->schoolyear;
                                                } ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row allbuttons">
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filter_tab(1)">Publication des résultats</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filter_tab(2)">Réunion de parents</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="filter_tab(3)">journal d'appel</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filter_tab(4)">frais scolaires</button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary" onclick="filter_tab(5)">Châtiment</button>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4" id="1" style="display: none;">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="mb-4">Publication des résultats</h6>
                            </div>
                            <?php if (isset($Publication)) { ?>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" onclick="remain({{$Publication->student_id}},'ParentMeeting')">Send Mail</button>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <p>kokf</p> -->
                        @if(session()->has('message'))
                        <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S. Non</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">identifiant de succursale</th> -->
                                        <!-- <th scope="col">Carte d'étudiant</th> -->
                                        <td scope="col">nom de l'enfant</td>
                                        <td scope="col">classe</td>
                                        <td scope="col">Option</td>
                                        <td scope="col">Type</td>
                                        <th scope="col">pourcentage</th>
                                        <th scope="col">place_occupé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($Publication)) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo  date('d-m-y', strtotime($Publication->created_at)) ?></td>
                                            <!-- <td>{{$Publication->branch_id}}</td> -->
                                            <!-- <td>{{$Publication->student_id}}</td> -->
                                            <td>{{$Publication->child_name}}</td>
                                            <td>{{$Publication->class}}</td>
                                            <td>{{$Publication->option_name}}</td>
                                            <td>{{$Publication->type}}</td>
                                            <td>{{$Publication->percentage}}</td>
                                            <td>{{$Publication->place_occupied}}</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4" id="2" style="display: none;">
                        <div class="row">
                            <div class="col-md-9">
                                <h6 class="mb-4">Réunion de parents</h6>
                            </div>
                            <?php if (isset($ParentMeeting)) { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-info sendMail" onclick="sendMailMeeting({{$ParentMeeting->student_id}})">Send Meeting Mail</button>
                                </div>
                            <?php } ?>
                        </div>
                        @if(session()->has('message'))
                        <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S. Non</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">identifiant de succursale</th> -->
                                        <!-- <th scope="col">Carte d'étudiant</th> -->
                                        <td scope="col">nom d'étudiant</td>
                                        <td scope="col">classe</td>
                                        <td scope="col">Option</td>
                                        <th scope="col">taper</th>
                                        <th scope="col">participation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($ParentMeeting)) { ?>
                                        <td>1</td>
                                        <td><?php echo  date('d-m-y', strtotime($ParentMeeting->created_at)) ?></td>
                                        <!-- <td>{{$ParentMeeting->branch_id}}</td> -->
                                        <!-- <td>{{$ParentMeeting->student_id}}</td> -->
                                        <td>{{$ParentMeeting->student_name}}</td>
                                        <td>{{$ParentMeeting->class}}</td>
                                        <td>{{$ParentMeeting->option}}</td>
                                        <td>{{$ParentMeeting->type}}</td>
                                        <td>{{$ParentMeeting->participation}}</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4" id="3" style="display: none;">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="mb-4">journal d'appel</h6>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMeeting">Add</button>
                            </div>

                        </div>
                        @if(session()->has('message'))
                        <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S. Non</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">Time</th> -->
                                        <!-- <th scope="col">Carte d'étudiant</th> -->
                                        <td scope="col">nom d'étudiant</td>
                                        <td scope="col">classe</td>
                                        <th scope="col">présence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($calllog)) { ?>
                                        @foreach($calllog as $key=>$calllog)

                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td><?php echo  date('d-m-y', strtotime($calllog->date)) ?></td>
                                            <!-- <td><?php echo  date('H:s', strtotime($calllog->created_at)) ?></td> -->
                                            <!-- <td>{{$calllog->student_id}}</td> -->
                                            <td>{{$calllog->student_name}}</td>
                                            <td>{{$calllog->class}}</td>
                                            <td>
                                                <?php if ($calllog->attendance == 1) { ?>
                                                    <button onclick="changeStatus({{$calllog->id}},'calllog')" class="btn btn-success">Present</button>
                                                <?php } else { ?>
                                                    <button onclick="changeStatus({{$calllog->id}},'calllog')" class="btn btn-danger">Absent</button>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                        @endforeach
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function changeStatus(ids, name) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('statusChange')}}",
                        data: {
                            ids: ids,
                            name: name,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        success: function(data) {
                            console.log(data)
                            if ($.trim(data) == "done") {
                                location.reload();
                            }
                        }

                    });

                }
            </script>
            <!-- Start School Modal -->
            <div class="modal fade depositeSchoolFee" id="addMeeting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="color:red;display:none">Student Id Invalid</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <form action="#">
                                    <div class="row">
                                        <div class="CallDate col-md-6">
                                            <label for="form-group">Enter Date</label>
                                            <input type="date" id="dateStudent" class="form-control">
                                        </div>
                                        <div class="switch-button col-md-6"><span class="active"></span>
                                            <button type="button" onclick="PresentStudent('0')" class="switch-button-case left active-case"><b>No</b></button>
                                            <button type="button" onclick="PresentStudent('1')" class="switch-button-case right"><b>Yes</b></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <input type="hidden" id="switch_val">
                            <button type="button" class="btn btn-primary" onclick="addOptionMeeting()">Attendance</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End School Modal -->

            <div class="row  ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4" id="4" style="display: none;">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="mb-4">frais scolaires</h6>
                            </div>
                            <?php if (isset($SchoolFee)) { ?>
                                <div class="col-md-2">
                                    <!-- <button class="btn btn-primary" onclick="remain({{$SchoolFee->id}},'deposite')">deposit</button> -->
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" onclick="remain({{$SchoolFee->student_id}},'remain')">Remain</button>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <p>kokf</p> -->
                        @if(session()->has('message'))
                        <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S. Non</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">identifiant de succursale</th> -->
                                        <!-- <th scope="col">Carte d'étudiant</th> -->
                                        <td scope="col">nom d'étudiant</td>
                                        <td scope="col">classe</td>
                                        <th scope="col">le montant payé</th>
                                        <th scope="col">équilibre</th>
                                        <th scope="col">encours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($SchoolFee)) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo  date('d-m-y', strtotime($SchoolFee->created_at)) ?></td>
                                            <!-- <td>{{$SchoolFee->branch_id}}</td> -->
                                            <!-- <td>{{$SchoolFee->student_id}}</td> -->
                                            <td>{{$SchoolFee->student_name}}</td>
                                            <td>{{$SchoolFee->class}}</td>
                                            <td>{{$SchoolFee->amount_paid}}</td>
                                            <td>{{$SchoolFee->balance}}</td>
                                            <td>{{$SchoolFee->outstanding_amount}}</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4" id="5" style="display: none;">
                        <h6 class="mb-4">Châtiment</h6>
                        <!-- <p>kokf</p> -->
                        @if(session()->has('message'))
                        <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S. Non</th>
                                        <!-- <th scope="col">identifiant de succursale</th> -->
                                        <!-- <th scope="col">Carte d'étudiant</th> -->
                                        <td scope="col">nom d'étudiant</td>
                                        <td scope="col">classe</td>
                                        <th scope="col">taper</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($punishment)) { ?>
                                        @foreach($punishment as $key=>$punishment)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <!-- <td>{{$punishment->branch_id}}</td> -->
                                            <!-- <td>{{$punishment->student_id}}</td> -->
                                            <td>{{$punishment->student_name}}</td>
                                            <td>{{$punishment->class}}</td>
                                            <td>{{$punishment->type}}</td>
                                        </tr>
                                        @endforeach
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function sendMailMeeting(id) {

                let confirms = confirm('Are You sure to want send mail for this student')
                if (confirms == 'false') {
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{url('sendMailMeeting')}}",
                        data: {
                            id: id,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        success: function(data) {
                            console.log(data)
                        }
                    });
                }
            }
        </script>
        <script>
            function remain(id, name) {
                let a = confirm('Are you sure that you want to send email to this student ??');
                if (a == true) {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('mailSchoolFee')}}",
                        data: {
                            id: id,
                            name: name,
                            _token: '<?php echo csrf_token() ?>'
                        },
                        success: function(data) {
                            console.log(data)
                        }
                    });
                } else {
                    return false;
                }
            }
        </script>
        <script>
            function filter_tab(id) {
                if (id == 1) {
                    document.getElementById('1').style.display = "block";
                    document.getElementById('2').style.display = "none";
                    document.getElementById('3').style.display = "none";
                    document.getElementById('4').style.display = "none";
                    document.getElementById('5').style.display = "none";
                    document.getElementById('1').scrollIntoView();
                } else if (id == 2) {
                    document.getElementById('1').style.display = "none";
                    document.getElementById('2').style.display = "block";
                    document.getElementById('3').style.display = "none";
                    document.getElementById('4').style.display = "none";
                    document.getElementById('5').style.display = "none";
                    document.getElementById('2').scrollIntoView();

                } else if (id == 3) {
                    document.getElementById('1').style.display = "none";
                    document.getElementById('2').style.display = "none";
                    document.getElementById('3').style.display = "block";
                    document.getElementById('4').style.display = "none";
                    document.getElementById('5').style.display = "none";
                    document.getElementById('3').scrollIntoView();

                } else if (id == 4) {
                    document.getElementById('1').style.display = "none";
                    document.getElementById('2').style.display = "none";
                    document.getElementById('3').style.display = "none";
                    document.getElementById('4').style.display = "block";
                    document.getElementById('5').style.display = "none";
                    document.getElementById('4').scrollIntoView();

                } else if (id == 5) {
                    document.getElementById('1').style.display = "none";
                    document.getElementById('2').style.display = "none";
                    document.getElementById('3').style.display = "none";
                    document.getElementById('4').style.display = "none";
                    document.getElementById('5').style.display = "block";
                    document.getElementById('5').scrollIntoView();

                }
            }
        </script>
        <script>
            'use strict';

            var switchButton = document.querySelector('.switch-button');
            var switchBtnRight = document.querySelector('.switch-button-case.right');
            var switchBtnLeft = document.querySelector('.switch-button-case.left');
            var activeSwitch = document.querySelector('.active');

            function switchLeft() {
                switchBtnRight.classList.remove('active-case');
                switchBtnLeft.classList.add('active-case');
                activeSwitch.style.left = '0%';
            }

            function switchRight() {
                switchBtnRight.classList.add('active-case');
                switchBtnLeft.classList.remove('active-case');
                activeSwitch.style.left = '50%';
            }

            switchBtnLeft.addEventListener('click', function() {
                switchLeft();
            }, false);

            switchBtnRight.addEventListener('click', function() {
                switchRight();
            }, false);
        </script>
        <script>
            function PresentStudent(id) {
                $("#switch_val").val(id);
            }

            function addOptionMeeting() {
                var switch_val = $("#switch_val").val();
                let dateStudent = document.getElementById('dateStudent').value;
                let everyId = document.getElementById('everyId').value;
                $.ajax({
                    type: "POST",
                    url: "{{url('callLogPresent')}}",
                    data: {
                        everyId: everyId,
                        switch_val: switch_val,
                        dateStudent: dateStudent,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "invalid") {
                            document.getElementById('staticBackdropLabel').style.display = "block";
                        } else if ($.trim(data) == "done") {
                            location.reload();
                        }
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
        @include('Sub_Admin.layout.footer')