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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Import</h5>
                                <div class="importdiv">
                                    <a href="{{asset('public/ExcelFile.xlsx')}}" download="Sample" class="importbtn">Download Sample</a>
                                </div>
                                <form method="post" enctype="multipart/form-data" action="{{url('uploadExcelStudentRegistration')}}" class="chooseEndUploadBtn">
                                    @csrf
                                    <input type="file" name="myfile" required="">
                                    <button type="submit" class="btnColor">Upload</button>
                                </form>
                                <div id="error-message" style="display: none; color: red;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <table style="display: none;" class="table" id="student_list">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">first_name</th>
                <th scope="col">last_name</th>
                <th scope="col">post_name</th>
                <th scope="col">email</th>
                <th scope="col">age</th>
                <th scope="col">place</th>
                <th scope="col">date_of_birth</th>
                <th scope="col">father</th>
                <th scope="col">mother</th>
                <th scope="col">telephone</th>
                <th scope="col">mobile</th>
                <th scope="col">schoolyear</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentRegister as $key=>$val)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$val->first_name}}</td>
                <td>{{$val->last_name}}</td>
                <td>{{$val->post_name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->age}}</td>
                <td>{{$val->place}}</td>
                <td>{{$val->date_of_birth}}</td>
                <td>{{$val->father}}</td>
                <td>{{$val->mother}}</td>
                <td>{{$val->telephone}}</td>
                <td>{{$val->mobile}}</td>
                <td>{{$val->schoolyear}}</td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
    @include('Sub_Admin.layout.footer')
    <!-- Table End -->
    <!-- <script src="{{asset('public/subAdmin/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('public/subAdmin/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('public/subAdmin/DataTables/datatables.min.js')}}"></script>
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
                    filename: 'Student Table',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                }, ],
            });
        });
    </script> -->