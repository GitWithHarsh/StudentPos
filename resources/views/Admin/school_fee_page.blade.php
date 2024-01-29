<body>
    <div class="container-scroller">
        @include('Admin.layout.header')
        <title>Frais scolaires</title>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <!-- <h3 class="page-title"> Branch List Table </h3> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Home')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Frais scolaires</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mainDashHead">Frais scolaires</h4>
                                <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                                </p>
                                <div class="">
                                    <table class="table table-striped" id="student_list">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>identifiant de succursale</th>
                                                <th>Carte d'étudiant</th>
                                                <th>date</th>
                                                <th>nom d'étudiant</th>
                                                <th>classe</th>
                                                <td>le montant payé</td>
                                                <td>équilibre</td>
                                                <td>encours</td>
                                            </tr>
                                        </thead>
                                        @foreach($SchoolFee as $key=>$val)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$val->branch_id}}</td>
                                            <td>{{$val->student_id}}</td>
                                            <td><?php echo date('d-m-y', strtotime($val->updated_at)); ?></td>
                                            <td>{{$val->student_name}}</td>
                                            <td>{{$val->class}}</td>
                                            <td>{{$val->amount_paid}}</td>
                                            <td>{{$val->balance}}</td>
                                            <td>{{$val->outstanding_amount}}</td>
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