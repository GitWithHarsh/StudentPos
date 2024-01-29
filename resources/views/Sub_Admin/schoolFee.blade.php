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

    .bodyMargin {
        margin: 15px 2px 0px 0px;
    }
 

    .errorInvalid {
        position: relative;
        margin: auto;
        margin: -39px 0px 19px 0px;
        text-align: center;
        display: none;
        color: red;
        font-size: larger;
        font-weight: 600;
    }
    .modal-footer {
    border-top: unset !important;
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
                            <h6 class="mb-4 mainHead">Liste des frais de scolarité</h6>
                        </div>
                        <div class="col-md-5">
                            <div class="btnRight">
                                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#modalSchoolFee">
                                    Deposit
                                </button>
                                <button type="button" class="btn btn-info btn-lg" onclick="Remainder()">
                                    Remainder
                                </button>
                        </div>
                        </div>
             </div>
                    <script>
                        function Remainder() {
                            let confirms = confirm('Are you sure to want send the mail for all student');
                            if (confirms == false) {
                                return false;
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "{{url('sendRemainderMailallStudent')}}",
                                    data: {
                                        _token: '<?php echo csrf_token(); ?>'
                                    },
                                    success: function(data) {
                                        console.log(data)
                                    }
                                });
                            }
                        }
                    </script>

                    <div class="table-responsive">
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Carte d'étudiant</th>
                                    <th scope="col">nom d'étudiant</th>
                                    <th scope="col">classe</th>
                                    <th scope="col">le montant payé</th>
                                    <th scope="col">équilibre</th>
                                    <th scope="col">encours</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SchoolFee as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->student_name}}</td>
                                    <td>{{$val->class}}</td>
                                    <td>{{$val->amount_paid}}</td>
                                    <td>{{$val->balance}}</td>
                                    <td>{{$val->outstanding_amount}}</td>
                                    <td>
                                        <a href=""><i class="fa fa-eye"></i></a>
                                        <a href=""><i class="fa fa-pen"></i></a>
                                        <a href=""><i class="fa fa-trash"></i></a>
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
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade depositeSchoolFee" id="modalSchoolFee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <span class="errorInvalid" id="showError">Enter valid student id</span>
                <span class="errorInvalid" id="greaterPrice">Your Amount is greater the class Price</span>
                <div class="modal-body">
                    <div>
                        <input class="form-control bodyMargin upperdiv" type="text" placeholder="Student Id" name="StudentId" id="StudentId">
                    </div>
                    <div>
                        <input class="form-control bodyMargin" type="text" id="amount" placeholder="Enter Deposit Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" onclick="DepositeMoney()">Deposit</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function DepositeMoney() {
            let StudentId = document.getElementById('StudentId').value;
            let amount = document.getElementById('amount').value;
            if (StudentId == "") {
                $('#StudentId').focus();
                $('#StudentId').css('display', '4px solid red')
                return false;
            } else if (amount == "") {
                $('#amount').focus();
                $('#StudentId').css('display', '4px solid red')
                $('#amount').css('display', '4px solid red')
                return false;
            } else {
                $.ajax({
                    type: "post",
                    url: "{{url('filterDeposit')}}",
                    data: {
                        StudentId: StudentId,
                        amount: amount,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "invalid") {
                            document.getElementById('showError').style.display = 'block';
                        } else if ($.trim(data) == "greater") {
                            document.getElementById('greaterPrice').style.display = "block";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $('#student_list').DataTable();
    </script>