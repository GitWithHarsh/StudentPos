<style>
 
    
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="mb-4 mainHead">Téléchargement des résultats</h6>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="window.location.href='{{url("student_Register")}}'">Ajouter un étudiant</button>
                        </div>
                    </div>
                    <!-- <p>kokf</p> -->
                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div class=" ">
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S.Non</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Nombre total d'étudiants</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ClassOption as $key=>$val)
                                <?php $totalStudent = DB::table('student_registers')->where(['branch_id' => $branchId, 'student_class' => $val->id, 'student_option' => $val->optionId])->count(); ?>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->add_class}}</td>
                                    <td>{{$val->OptionName}}</td>
                                    <td style="cursor: pointer;" onclick="window.location.href='{{url("studentList")}}?classId={{base64_encode("$val->id")}}&optionId={{base64_encode("$val->optionId")}}'">{{$totalStudent}}</td>
                                    <td>
                                        <a href=""><i class="fa fa-eye"></i></a>
                                        <a href="{{url('deleteStudentByOption')}}?key={{base64_encode($val->optionId)}}" onclick="return confirm('Are you sure to want delete all student of this option')"><i class="fa fa-trash"></i></a>
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
    @include('Sub_Admin.layout.footer')
    <!-- Table End -->
    <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
    <script>
        $('#student_list').DataTable();
    </script>