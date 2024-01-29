<style>
    td.IconView a {
        color: white;
        font-size: 16px;
    }

    .sorting::after {
        line-height: 2px !important;
    }

    .sorting::before {
        line-height: 2px !important;
    }

    .brachAdd {
        background: #cc6601 !important;
        border: unset !important;
    }

    .mbUnset {
        margin-bottom: unset !important;
    }

    div#branch_list_filter {
        position: absolute;
        right: 155px;
        z-index: 999999;
    }
</style>
<div class="container-scroller">
    @include('Admin.layout.header')
    <title>
        Liste des succursales</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <!-- <h3 class="page-title  "> Branch List Table </h3> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Liste des succursales</li>
                    </ol>
                </nav>

            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card-title mbUnset mainDashHead">
                                        Liste des succursales</h4>
                                </div>
                                <div class="col-md-2" onclick="window.location.href='{{url("create_sub_admin")}}'">
                                    <h4 class="card-title btn btn-primary mbUnset brachAdd" onclick="window.location.href='{{url("create_sub_admin")}}'">Ajouter</h4>
                                </div>
                            </div>
                            <div class=" ">
                                <table class="table table-striped" id="branch_list">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Identifiant de la succursale</th>
                                            <th style="width: 50px !important;">Nom de la filiale</th>
                                            <th>Nom du directeur de succursale</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($branchList as $key=>$val)
                                        <tr>
                                            <td> {{++$key}} </td>
                                            <td> {{$val->branch_id}} </td>
                                            <td>{{$val->branch_name}}</td>
                                            <td>{{$val->first_name}} {{$val->last_name}}</td>
                                            <!-- <td>{{$val->branch_name}}</td> -->
                                            <td>
                                                @if($val->status==1)
                                                <button class="btn btn-primary btnActive" onclick="changeStatus({{$val->id}},'addSubAdmin')">Active</button>
                                                @else
                                                <button class="btn btn-danger btnInactive" onclick="changeStatus({{$val->id}},'addSubAdmin')">Inactive</button>
                                                @endif
                                            </td>
                                            <td class="IconView">
                                                <a href="{{url('branch_admin')}}?id={{base64_encode($val->id)}}"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{url('delete_data')}}?id={{base64_encode($val->id)}}&key={{base64_encode('addSubAdmin')}}"><i class="mdi mdi-delete"></i></a>
                                                <a href="{{url("create_sub_admin")}}?id={{base64_encode($val->id)}}"><i class="mdi mdi-rename-box"></i></a>
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
        <script>
            $(document).ready(function() {
                $('#branch_list').DataTable({
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