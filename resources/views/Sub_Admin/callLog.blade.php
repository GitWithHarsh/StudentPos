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
</style>
<div class="container-fluid position-relative d-flex p-0">
    @include('Sub_Admin.layout.header')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4 mainHead">
                        Liste du journal des appels</h6>
                    <!-- <p>kokf</p> -->
                    @if(session()->has('message'))
                    <p class="alert alert-danger">{{session()->get('message')}}</p>
                    @endif
                    <div class=" table-striped">
                        <table class="table table-striped" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        S. Non</th>
                                    <th scope="col">
                                        Carte d'étudiant</th>
                                    <th scope="col">nom d'étudiant</th>
                                    <th scope="col">classe</th>
                                    <th scope="col">présence</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calllog as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->student_name}}</td>
                                    <td>{{$val->class}}</td>
                                    <td>{{$val->attendance}}</td>
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