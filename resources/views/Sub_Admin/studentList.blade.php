<style>
    select.form-control.form-control-sm {
        width: 76px;
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
                            <h6 class="mb-4 mainHead">Total des étudiants de <?php echo $ClassOptionName->add_class . ' ' . $ClassOptionName->option; ?></h6>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="window.location.href='{{url("studentUpload")}}?opId={{base64_encode($optionId)}}&classId={{base64_encode($classId)}}'">Transfert groupé</button>
                        </div>
                        <div class="col-md-2">
                            <div class="rightAdd">
                                <button onclick="window.location.href='{{url("student_Register")}}?opId={{base64_encode($optionId)}}'" class="btn btn-info">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <!-- <p>kokf</p> -->
                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div class="">
                        <?php if (count($studentRegister) > 0) { ?>
                            <table class="table table-striped" id="student_list">
                                <thead>
                                    <tr>
                                        <th scope="col">S.Non</th>
                                        <th scope="col">Carte d'étudiant</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">E-mail</th>
                                        <!-- <th scope="col">mère</th>
                                    <th scope="col">année scolaire</th> -->
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($studentRegister as $key=>$val)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <th scope="row">{{$val->student_image}}</th>
                                        <td>{{$val->first_name}} {{$val->last_name}}</td>
                                        <!-- <td>{{$val->email}}</td> -->
                                        <td>{{$val->email}}</td>
                                        <!-- <td>{{$val->mother}}</td>
                                    <td>{{$val->schoolyear}}</td> -->
                                        <td>
                                            @if($val->status ==1)
                                            <button class="btn btn-success btnActive" onclick="changeStatus({{$val->id}},'studentRegister')">Active</button>
                                            @else
                                            <button class="btn btn-primary btnInActive" onclick="changeStatus({{$val->id}},'studentRegister')">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('studentDetails')}}?id='{{base64_encode($val->id)}}'"><i class="fa fa-eye"></i></a>
                                            <a href="{{url("student_Register")}}?id={{base64_encode($val->id)}}"><i class="fa fa-pen"></i></a>
                                            <a href="{{url('delete_Student_Data')}}?key={{base64_encode($val->id)}}" onclick="return confirm('Are you sure to want delete this account')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <span><b>No Data Found</b></span>
                        <?php } ?>
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
    @include('Sub_Admin.layout.footer')
    <!-- Table End -->
    <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
    <script>
        $('#student_list').DataTable();
    </script>