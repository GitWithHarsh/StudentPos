<style>
    td.IconView a {
        color: white;
        font-size: 16px;
    }

    button.dt-button.buttons-excel.buttons-html5 {
        margin-bottom: 20px;
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

    .listAdd {
        background: #cc6601 !important;
        padding: 10px 30px !important;
        border: unset !important;
    }

    .btnActive {
        background: #006500 !important;
        padding: 10px 30px !important;
        border: unset !important;
        width: 130px;
    }

    .listEditDel i {
        color: #006500;
        font-size: 25px;
    }

    .form-control:focus {
        color: white !important;
    }
</style>
<div class="container-scroller">
    @include('Admin.layout.header')
    <title>
        liste de classe</title>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <!-- <h3 class="page-title"> Branch List Table </h3> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('Home')}}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Classe</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card-title mainDashHead">
                                        Liste des classes</h4>
                                    @if(session()->has('message'))
                                    <p class="alert alert-danger"><b>{{session()->get('message')}}</b></p>
                                    @endif
                                </div>
                                <div class="col-md-2" onclick="window.location.href='{{url("add_class")}}'">
                                    <h4 class="card-title btn btn-primary listAdd">Add</h4>
                                </div>
                            </div>
                            <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                            <div class="">
                                <table class="table table-striped" id="branch_list">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Nom du cours</th>
                                            <th>Statut</th>
                                            <th>
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($AddClass as $key=>$val)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$val->add_class}}</td>
                                            <td>
                                                @if($val->status==1)
                                                <button class="btn btn-primary btnActive" onclick="changeStatus({{$val->id}},'AddClass')">Active</button>
                                                @else
                                                <button class="btn btn-danger btnInActive" onclick="changeStatus({{$val->id}},'AddClass')">InActive</button>
                                                @endif
                                            </td>
                                            <td class="listEditDel">
                                                <a href="{{url('delete_data')}}?id={{base64_encode($val->id)}}&key={{base64_encode('AddClass')}}" onclick="return confirm('Are you sure to want delete this class')"><i class="mdi mdi-delete"></i></a>
                                                <a href="{{url("add_class")}}?id={{base64_encode($val->id)}}"><i class="mdi mdi-rename-box"></i></a>
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