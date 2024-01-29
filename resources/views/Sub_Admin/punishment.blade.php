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
    .modal-dialog textarea {
    border: 1px solid #cc6601;
    margin-top: 10px;
    border-radius: 5px;
}
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-4 mainHead">Liste des punitions</h4>
                        </div>
                        <div class="col-md-4">
                    <div class="btnRight">
                        <button class="punishmemt btn btn-info" data-bs-toggle="modal" data-bs-target="#addMeeting">Add punishment</button>
                    </div>
                        </div>
                    </div>
                    <!-- <p>kokf</p> -->

                    <div>
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S. Non</th>
                                    <th scope="col">Carte d'étudiant</th>
                                    <th scope="col">nom d'étudiant</th>
                                    <th scope="col">classe</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Châtiment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($punishment as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->student_name}}</td>
                                    <td>{{$val->ClassName}}</td>
                                    <td>{{$val->optionName}}</td>
                                    <td>{{$val->type}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade depositeSchoolFee" id="addMeeting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p style="display: none;" id="StudentId" class="alert alert-danger">Invalid Student Id</p>
                        <form action="">
                            <label for="form-group"><b>Student ID</b></label>
                            <input type="text" id="studentId" class="form-control" placeholder="Type OF Meeting">
                            <label for="form-group"><b>Punishment Decription</b></label>
                            <textarea name="" id="punishmentDescription" cols="53" rows="2"></textarea>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="addPunishment()">Punishment</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addPunishment() {
            let studentId = document.getElementById('studentId').value;
            let punishmentDescription = document.getElementById('punishmentDescription').value;
            if (studentId == "") {
                $('#studentId').css('border', '2px solid red');
                $('#studentId').focus();
                return false;
            } else if (punishmentDescription == "") {
                $('#studentId').css('border', '2px solid white');
                $('#punishmentDescription').css('border', '2px solid red');
                $('#punishmentDescription').focus();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{url('AddPunishment')}}",
                    data: {
                        studentId: studentId,
                        punishmentDescription: punishmentDescription,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "invalid") {
                            document.getElementById('StudentId').style.display = "block";
                            $('#StudentId').fadeIn(2000);
                            $('#StudentId').fadeOut(2000)
                        } else if ($.trim(data) == "done") {
                            location.reload();
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