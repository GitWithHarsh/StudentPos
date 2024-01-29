<style>
 

    select.form-control.form-control-sm {
        width: 76px;
    }

 
    input.form-control.form-control-sm {
        border: 1px solid #cc6601 !important;
        border-radius: 5px !important;
    }

    div#student_list_wrapper {
        padding-left: unset !important;
    }

    .modal-header {
        border-bottom: unset !important;
    }

    .modal-footer {
        border-top: unset !important;
    }

    .invalidId {
        color: red;
        text-align: center;
        margin: -54px 0 0 0;
        font-size: larger;
        font-weight: bold;
        display: none;
    }

    .doneStudentId {
        color: green;
        text-align: center;
        margin: -54px 0 0 0;
        font-size: larger;
        font-weight: bold;
        display: none;
    }

    
 
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-5">
                            <h6 class="mb-4 mainHead">Liste des réunions de parents</h6>
                        </div>
                        <div class="col-lg-7">
                        <div class="btnRight">

                        <button class="btn btn-info bnt3" data-bs-toggle="modal" data-bs-target="#addMeeting">Add</button>
                        <button class="btn btn-info btn1" onclick="allsendMail()">Send Mail All Student</button>
                        <button class="btn btn-info btn2" data-bs-toggle="modal" data-bs-target="#modalSchoolFee">Send Mail</button>

                        </div>
                        </div>
                    </div>

                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div>
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S. Non</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Carte d'étudiant</th>
                                    <th scope="col">nom d'étudiant</th>
                                    <th scope="col">classe</th>
                                    <th scope="col">taper</th>
                                    <th scope="col">participation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ParentMeeting as $key=>$val)
                                <?php
                                $optionName = DB::table('add_options')->where(['id' => $val->option])->first();
                                $className = DB::table('add_classes')->where(['id' => $val->class])->first();

                                ?>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$className->add_class}}</td>
                                    <td><?php if (isset($optionName)) {
                                            echo $optionName->option;
                                        } ?></td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->student_name}}</td>
                                    <td>{{$val->class}}</td>
                                    <td>{{$val->type}}</td>
                                    <td>
                                        @if($val->participation==1)
                                        <button class="btn btn-info btnActive" onclick="changeStatus({{$val->id}},'ParentMeeting')">Yes</button>
                                        @else
                                        <button class="btn btn-danger btnInActive" onclick="changeStatus({{$val->id}},'ParentMeeting')">No</button>
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
    <script>
        function changeStatus(id, name) {
            $.ajax({
                type: "POST",
                url: "{{url('statusChange')}}",
                data: {
                    id: id,
                    name: name,
                    _token: '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    console.log(data)
                    if ($.trim(data) == "done") {
                        location.reload();
                    }
                }
            })

        }
    </script>

    <div class="modal fade depositeSchoolFee" id="addMeeting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="">
                            <label for="form-group"><b>Enter Class Name</b></label>
                            <select id="className" class="form-control" onchange="selectClass()">
                                <option selected disabled>Enter Class Name</option>
                                @foreach($AddClass as $val)
                                <option value="{{$val->id}}">{{$val->add_class}}</option>
                                @endforeach
                            </select>
                            <label for="form-group"><b>Enter Option Name</b></label>
                            <select id="AddOption" class="form-control">
                                <option disabled selected>Enter Option Name</option>
                            </select>
                            <label for="form-group"><b>Type Of Meeting</b></label>
                            <input type="text" id="typeMeeting" class="form-control" placeholder="Type OF Meeting">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="addOptionMeeting()">Creat Meeting</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function selectClass() {
            let className = document.getElementById('className').value;
            $.ajax({
                type: "POST",
                url: "{{url('filterMeeting')}}",
                data: {
                    className: className,
                    _token: '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    console.log(data)
                    $('#AddOption').html(data)
                }
            });
        }
    </script>
    <script>
        function addOptionMeeting() {
            let optionName = document.getElementById('AddOption').value;
            let typeMeeting = document.getElementById('typeMeeting').value;
            let className = document.getElementById('className').value;
            if (typeMeeting == "") {
                $('#typeMeeting').css('display', '2px solid red')
                $('#typeMeeting').focus();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{url('filterMeeting')}}",
                    data: {
                        optionName: optionName,
                        classNames: className,
                        typeMeeting: typeMeeting,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "done") {
                            location.reload();
                        }
                        // $('#AddOption').html(data)
                    }
                });
            }
        }
    </script>

    <div class="modal fade depositeSchoolFee" id="modalSchoolFee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="invalidId" id="invalidIdValid">
                            <span>Invalid Student Id</span>
                        </div>
                        <div class="doneStudentId" id="doneStudentId">
                            <span>Successfully Send</span>
                        </div>
                        <form action="">
                            <label for="form-group"><b>Enter Student Id</b></label>
                            <input type="text" id="StudentId" class="form-control">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="sendMail()">Send Mail</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sendMail() {
            let StudentId = document.getElementById('StudentId').value;
            if (StudentId == "") {
                $('#StudentId').focus();
                $('#StudentId').css('2px solid red');
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{url('sendMailMeeting')}}",
                    data: {
                        id: StudentId,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        // if ($.trim(data) == "done") {
                        //     document.getElementById('doneStudentId').style.display = "block";
                        //     document.getElementById('invalidIdValid').style.display = "one";
                        //     setTimeout(() => {
                        //         location.reload();
                        //     }, 3000);
                        // } else if ($.trim(data) == "InvalidId") {
                        //     document.getElementById('invalidIdValid').style.display = "block";
                        //     document.getElementById('doneStudentId').style.display = "none";
                        // }
                    }
                });
            }
        }
    </script>
    <script>
        function allsendMail() {
            let confirms = confirm('Are your sure to send the mail for all Student');
            if (confirm == "flase") {
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{url('sendMailforParentMeeting')}}",
                    data: {
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "done") {
                            $("#mailSendForAllStudent").fadeIn(3000);
                            setTimeout(() => {
                                location.reload();
                            }, 4000);
                        }
                    }
                });
            }
        }
    </script>
    @include('Sub_Admin.layout.footer')
    <!-- Table End -->
    <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
    <script>
        $('#student_list').DataTable();
    </script>