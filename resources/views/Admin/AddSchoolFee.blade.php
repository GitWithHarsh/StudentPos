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

    .dt-button.buttons-excel.buttons-html5 {
        margin-bottom: 20px;
    }

    .form-control:focus {
        color: white !important;
    }
</style>
<div class="container-scroller">
    @include('Admin.layout.header')
    <title>Fee List</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <!-- <h3 class="page-title"> Branch List Table </h3> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            frais scolaires</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="mainDashHead">Liste des frais</h3>

                                </div>
                                <div class="col-md-2" onclick="window.location.href='{{url("schoolFeeAdd")}}'">
                                    <h4 class="card-title btn btn-primary listAdd">
                                        Ajouter</h4>
                                </div>
                            </div>
                            </p>
                            <div class=" ">
                                <table class="table table-striped" id="branch_list">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>classe</th>
                                            <th>Option</th>
                                            <th>Frais</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schollFee as $key=>$val)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$val->ClassName}}</td>
                                            <td>{{$val->option}}</td>
                                            <td>{{$val->SchoolFee}}</td>
                                            <td class="penIcon">
                                                <a href="{{url('schoolFeeAdd')}}?key={{base64_encode($val->id)}}"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{url('delete_data')}}?id={{base64_encode($val->id)}}&key={{base64_encode('SchoolFeeByAdmin')}}"><i class="mdi mdi-delete"></i></a>
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
                $('#branch_list').DataTable({
                    "columnDefs": [{
                        "width": "40%",
                        "targets": 2
                    }],
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excel',
                        text: 'Excel Export',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    }, ],
                });
            });
        </script>