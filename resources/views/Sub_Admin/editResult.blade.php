<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        div#student_list_filter {
            position: relative;
            left: 298px;
        }

        select.form-control.form-control-sm {
            width: 76px;
        }

        ul.pagination {
            position: relative;
            left: 365px;
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

        button.btn.btn-primary {
            margin: -29px 0 0 0 !important;
        }

        button.btn.btn-info.btn-lg {
            font-size: 13px;
            margin: 0px 0px 0px 50px;
        }

     
        .btnFreight2 {
            margin-top:10px;
            border:unset !important;
            padding: 6px 20px;
            border-radius: 5px;
            color: white !important;
            font-weight: 600;
            background-color: #cc6601 !important;
        }

        .frightFormSec input {
            margin-bottom: 15px;
            border: 1px solid #cc6601;
            background: white !important;
        }
        .frightFormSec input {
            margin-bottom: 15px;
            border: 1px solid #cc6601;
        }

        .frightFormSec select {
            margin-bottom: 10px;
            border: 1px solid #cc6601;
        }

        .frightFormSec label {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            color: black;
        }
    </style>
    <div class="container-fluid position-relative d-flex p-0">
        @include('Sub_Admin.layout.header')
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <form id="editResult">
                        @csrf
                        <section class="frightFormSec">
                            <span id="successs" style="display: none;"
                                class="form-control alert alert-success">Successfully Updated</span>
                            <span id="valid" style="display: none;" class="form-control alert alert-danger">Successfully
                                Updated</span>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Student Id</label>
                                        <input type="text"readonly<?php if(isset($result)){echo"readonly";} ?>
                                        value="
                                        <?php if(isset($result)){echo$result->student_id;}?>" class="form-control"
                                        placeholder="Add Student Id">
                                    </div>
                                    <div class="col">
                                        <label>Student Name</label>
                                        <input type="text" readonly <?php if (isset($result)) { echo "readonly" ; } ?>
                                        value="
                                        <?php if (isset($result)) {echo $result->child_name;} ?>" class="form-control"
                                        placeholder="Student Name">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Student Class</label>
                                        <input type="text" readonly <?php if (isset($view)) { echo "readonly" ; } ?>
                                        value="
                                        <?php if (isset($result)) {
                                                                                    echo $result->ClassName;
                                                                                } ?>" class="form-control"
                                        placeholder="Student Class">
                                    </div>
                                    <div class="col">
                                        <label>Student Option</label>
                                        <input type="text" readonly <?php if (isset($view)) { echo "readonly" ; } ?>
                                        value="
                                        <?php if (isset($result)) {
                                                                                    echo $result->optionName;
                                                                                } ?>" class="form-control"
                                        placeholder="Student Option">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>percentage</label>
                                        <input name="percentage" type="text" <?php if (isset($view)) { echo "readonly" ;
                                            } ?> value="
                                        <?php if (isset($result)) {
                                                                                                echo $result->percentage;
                                                                                            } ?>" class="form-control"
                                        placeholder="Student Percentage">
                                    </div>
                                    <div class="col">
                                        <label>Student place Occupied</label>
                                        <input name="Occupied" type="text" <?php if (isset($view)) { echo "readonly" ; }
                                            ?> value="
                                        <?php if (isset($result)) {
                                                                                            echo $result->place_occupied;
                                                                                        } ?>" class="form-control"
                                        placeholder="Student place Occupied">
                                        <input name="studentId" type="hidden" value="<?php if (isset($result)) {
                                                                                            echo $result->id;
                                                                                        } ?>">
                                    </div>
                                </div>
                                <?php if (!isset($view)) { ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btnFreight">
                                            <button class="btnFreight2">
                                                Close
                                            </button>
                                            <button type="button" class="btnFreight2" onclick="updateResult()">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function updateResult() {
                $.ajax({
                    type: "POST",
                    url: "{{url('updateResult')}}",
                    data: new FormData($('#editResult')[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        if ($.trim(data) == "done") {
                            document.getElementById('successs').style.display = 'block';
                            document.getElementById('valid').style.display = "none";
                            setInterval(() => {
                                window.location.href = "{{url('result_publication')}}"
                            }, 2000);

                        } else if ($.trim(data) == "invalid") {
                            document.getElementById('valid').style.display = "block";
                            document.getElementById('success').style.display = 'noone';

                        }
                    }


                });
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
</body>

</html>