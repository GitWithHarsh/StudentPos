<style>
 

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
                            <h6 class="mb-4">Class {{$ClassName->Class}}<sup>th</sup>{{$ClassName->Option}} &nbsp All Student</h6>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="window.location.href='{{url("student_Register")}}'">Add Student</button>

                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Student Id</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Father Name</th>
                                    <th scope="col">Date of birth</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentList as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_image}}</td>
                                    <td>{{$val->first_name}} &nbsp {{$val->last_name}}</td>
                                    <td>{{$val->father}}</td>
                                    <td>{{$val->date_of_birth}}</td>
                                    <td>Active</td>
                                    <td>Delete</td>
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