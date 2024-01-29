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
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="mb-4" style="color:black">Résultat total de <?php echo $ClassOption->Class . ' ' . $ClassOption->option; ?></h6>
                        </div>
                        <!-- <div class="col-md-2">
                            <button class="btn btn-primary" onclick="window.location.href='{{url("student_Register")}}'">Add Student</button>
                        </div> -->
                    </div>
                    <!-- <p>kokf</p> -->
                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div class="table-responsive">
                        <table class="table" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S. Non</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Taper</th>
                                    <th scope="col">Résultats totaux</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Publication as $key=>$val)
                                <?php $totalResult = DB::table('publications')->where(['created_at' => $val->created_at])->count(); ?>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><?php echo date('y-m-d', strtotime($val->created_at)) ?></td>
                                    <td>{{$val->type}}</td>
                                    <td style="cursor: pointer;" onclick="window.location.href='{{url("uploadResult")}}?key={{base64_encode($ClassOption->OptionId)}}&ClassId={{base64_encode($ClassOption->ClassId)}}&date={{base64_encode(date('Y-m-d H:i:s', strtotime($val->created_at)))}}'">{{$totalResult}}</td>
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