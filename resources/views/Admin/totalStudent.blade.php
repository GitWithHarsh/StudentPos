<style>

      .listAdd {

        background: #cc6601 !important;

        padding: 10px 30px !important;

        border: unset !important;

    }

 

    .listEditDel i {

        color: #006500;

        font-size: 25px;

    }

    .form-control:focus {

        color: white !important;

    }

 

</style>

<body>



    <div class="container-scroller">



        @include('Admin.layout.header')



        <title>Liste des étudiants</title>



        <!-- partial -->



        <div class="main-panel">



            <div class="content-wrapper">



                <div class="page-header">



                    <!-- <h3 class="page-title"> Branch List Table </h3> -->



                    <nav aria-label="breadcrumb">



                        <ol class="breadcrumb">



                            <li class="breadcrumb-item"><a href="{{url('Home')}}">Tableau de bord</a></li>



                            <li class="breadcrumb-item active" aria-current="page">Nombre total d'étudiants</li>



                        </ol>



                    </nav>



                </div>



                <div class="row">



                    <div class="col-lg-12 grid-margin stretch-card">



                        <div class="card">



                            <div class="card-body">



                                <h4 class="card-title mainDashHead">Liste totale des étudiants</h4>



                                <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->



                                </p>



                                <div>



                                    <table class="table table-striped" id="student_list">



                                        <thead>



                                            <tr>



                                                <th> # </th>



                                                <th> Prénom </th>



                                                <th>après le nom</th>



                                                <th>E-mail </th>



                                                <!-- <th>Download</th> -->



                                                <th>Statut</th>



                                                <th>Action</th>



                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach($studentRegister as $key=>$val)



                                            <tr>



                                                <td>{{++$key}}</td>



                                                <td>{{$val->first_name}} {{$val->last_name}}</td>



                                                <td>{{$val->post_name}}</td>



                                                <td>{{$val->email}}</td>



                                                <!-- <td>



                                                    <h2 class="text-center"><i class="mdi mdi-arrow-down-bold-box"></i></h2>



                                                </td> -->







                                                <td>



                                                    @if($val->status==1)



                                                    <button class="btn btn-primary btnActive" onclick="changeStatus({{$val->id}},'studentRegister')">Active</button>



                                                    @else



                                                    <button class="btn btn-danger btnInActive" onclick="changeStatus({{$val->id}},'studentRegister')">Inactive</button>



                                                    @endif



                                                </td>



                                                <td class="text-center listEditDel">



                                                    <a href=""><i class="mdi mdi-eye"></i></a>



                                                    <a href=""><i class="mdi mdi-delete"></i></a>



                                                    <!-- <a href=""><i class="mdi mdi-rename-box"></i></a> -->



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



                function changeStatus(id, model) {



                    $.ajax({



                        type: "POST",



                        url: "{{url('changeStatus')}}",



                        data: {



                            id: id,



                            model: model,



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







            <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>



            <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>



            <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>



            <script>



                $('#branch_list').DataTable();



            </script>



            @include('Admin.layout.footer')



            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>



            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>



            <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>



            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>



            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>



            <script>



                $(document).ready(function() {



                    $('#student_list').DataTable({



                        "columnDefs": [{



                            "width": "40%",







                        }],



                        dom: 'Bfrtip',



                        buttons: [{



                            extend: 'excel',



                            text: 'Exportation Excel',



                            exportOptions: {



                                columns: [0, 1, 2, 3]



                            }



                        }, ],



                    });



                });



            </script>