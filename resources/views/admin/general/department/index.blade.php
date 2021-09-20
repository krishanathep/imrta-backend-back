@extends('layouts.app')

@push('page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                 <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">หน่วยงาน</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success mt-3" href="{{ route('admin-general-department.create') }}"> <i class="fas fa-plus"></i> Create </a>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ลำดับ</th>
                                    <th>ชื่อหน่วยงาน</th>
                                    <th>สถานะ</th>
                                    <th>วันที่สร้าง</th>
                                    <th>วันที่แก้ไข</th>
                                    <th width='15%'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department as $list)
                                    <tr>
                                        <td>{{ $list->department_id }}</td>
                                        <td>{{ $list->department_name }}</td>
                                        <td align="center">
                                            
                                            @if ($list->department_status == 1)
                     <h5><span class="badge badge-success">Enable</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">Disible</span></h5>
                                    @endif
                                        </td>
                                        <td>{{ $list->updated_at }}</td>
                                        <td>{{ $list->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin-general-department.destroy', $list->department_id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('admin-general-department.show', $list->department_id) }}"> <i class="far fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('admin-general-department.edit', $list->department_id) }}"><i class="far fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete?')"> <i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Bootstrap Switch -->
<script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true
            , "lengthChange": false
            , "searching": false
            , "ordering": true
            , "info": true
            , "autoWidth": false
            , "responsive": true
        , });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('department_id');
        })
    });

</script>
@endpush
