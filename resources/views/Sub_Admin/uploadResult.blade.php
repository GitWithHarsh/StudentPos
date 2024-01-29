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
                        <div class="col-md-2">
                            <h6 class="mb-4">Class {{$ClassNameByStudentName->Class}}<sup>th</sup>{{$ClassNameByStudentName->Option}} &nbsp All Student</h6>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="window.location.href='{{url("student_Register")}}'">Add Student</button>
                            <a download="Sample" href="{{asset('public/publication.xlsx')}}">Download</a>

                        </div>
                        <div class="col-md-2">
                            <form action="{{url('uploadExcel')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="file" type="file" value="upload">
                                <input type="hidden" name="OptionNameByStudent" value="<?php if (isset($OptionName)) {
                                                                                            echo $OptionName;
                                                                                        } ?>">
                                <input type="hidden" name="ClassNameByStudent" value="<?php if (isset($ClassName)) {
                                                                                            echo $ClassName;
                                                                                        } ?>">

                                <input type="submit" value="UploadData">
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="student_list">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Student Id</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Occupied</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentList as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->student_id}}</td>
                                    <td>{{$val->child_name}}</td>
                                    <td>{{$val->percentage}}</td>
                                    <td>{{$val->place_occupied}}</td>

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
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }, ],
            });
        });
    </script>