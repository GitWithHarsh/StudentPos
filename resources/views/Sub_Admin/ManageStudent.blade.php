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
                    <div >
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S. Non</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Résultats totaux</th>
                                    <th scope="col">Télécharger les résultats</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totalClass as $key=>$val)
                                <?php
                                $branchId = session()->get('BranchId');
                                $result = DB::table('publications')->where(['branch_id' => $branchId, 'option_name' => $val->OptionId, 'class' => $val->ClassId])->get();

                                ?>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->add_class}}</td>
                                    <td>{{$val->option}}</td>
                                    <td style="cursor: pointer;" onclick="window.location.href='{{url("ResultByDate")}}?key={{base64_encode($val->OptionId)}}&&ClassId={{base64_encode($val->ClassId)}}'"><?php echo count($result); ?></td>
                                    <td onclick="window.location.href='{{url("uploadResult")}}?key={{base64_encode($val->OptionId)}}&&ClassId={{base64_encode($val->ClassId)}}'"><button class="btn btn-primary">Upload Result</button></td>
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