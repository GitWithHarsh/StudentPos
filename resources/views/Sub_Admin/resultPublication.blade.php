<style>
 

    select.form-control.form-control-sm {
        width: 76px;
    }
     div#student_list_wrapper {
        padding-left: unset !important;
    }

    input.form-control.form-control-sm {
        border: 1px solid #cc6601 !important;
        border-radius: 5px !important;
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
 
    #student_list td {
  height:60px;
}
#student_list th {
    height:60px;
}
.modal-footer button {
    background: #006500;
    border: unset;
}
.modal-dialog .modal-title {
    color: #006500;
}
.modal-dialog input {
    background: #fff;
    border: 1px solid #cc6601;
    margin-top: 10px;
}
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-7">
                            <h6 class="mb-4 mainHead">Result Publication List</h6>
                        </div>
                        <div class="col-md-5">
                            <div class="btnRight">
                             <button type="button" class="btn btn-info btn-lg me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalSchoolFee">Send Mail</button>
                             <button type="button" class="btn btn-info btn-lg" onclick="allsendMail()">Mail send All
                                    Student</button>
                            </div>
                        
                       </div>
                    <div>
                        <span style="display: none;" id="mailSendForAllStudent"
                            class="form-control alert alert-success"><b>Mail Successfully send for all
                                student</b></span>
                    </div>
                    <div class="modal fade depositeSchoolFee" id="modalSchoolFee" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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
                                    <button type="button" class="btn btn-primary" onclick="sendMail()">Send
                                        Mail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function allsendMail() {
                            let confirms = confirm('Are your sure to send the mail for all Student');
                            if (confirm == "flase") {
                                return false;
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "{{url('resultSendMailAllStudent')}}",
                                    data: {
                                        _token: '<?php echo csrf_token(); ?>'
                                    },
                                    success: function (data) {
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
                                    url: "{{url('resultMailByBranch')}}",
                                    data: {
                                        StudentId: StudentId,
                                        _token: '<?php echo csrf_token(); ?>'
                                    },
                                    success: function (data) {
                                        console.log(data)
                                        if ($.trim(data) == "done") {
                                            document.getElementById('doneStudentId').style.display = "block";
                                            document.getElementById('invalidIdValid').style.display = "one";
                                            setTimeout(() => {
                                                location.reload();
                                            }, 3000);
                                        } else if ($.trim(data) == "InvalidId") {
                                            document.getElementById('invalidIdValid').style.display = "block";
                                            document.getElementById('doneStudentId').style.display = "none";
                                        }
                                    }
                                });
                            }
                        }
                    </script>
                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div class=" ">
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Carte d'étudiant</th>
                                    <th scope="col">nom d'étudiant</th>
                                    <th scope="col">classe</th>
                                    <th scope="col">option</th>
                                    <th scope="col">pourcentage</th>
                                    <th scope="col">lieu occupé</th>
                                    <th scope="col">Total Mail Send</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Publication as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->child_name}}</td>
                                    <td>{{$val->ClaaName}}</td>
                                    <td>{{$val->OptionName}}</td>
                                    <td>{{$val->percentage}}</td>
                                    <td>{{$val->place_occupied}}</td>
                                    <td>{{$val->mailSend}}</td>
                                    <td>
                                        <a href="{{url('editResult')}}?key={{base64_encode($val->id)}}&name='view'"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{url('editResult')}}?key={{base64_encode($val->id)}}"><i
                                                class="fa fa-pen"></i></a>
                                        <a
                                            href="{{url('deleteAllData')}}?key={{base64_encode($val->id)}}&model={{base64_encode('Publication')}}"><i
                                                class="fa fa-trash"></i></a>
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
    @include('Sub_Admin.layout.footer')
    <!-- Table End -->
    <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
    <script>
        $('#student_list').DataTable();
    </script>