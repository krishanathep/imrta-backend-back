@extends('layouts.app')

@push('page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ประเภทโครงการวิจัย</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success mt-3" href="{{ route('admin-general-research.create') }}"> <i class="fas fa-plus"></i> Create </a>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Research Type</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>ลำดับ</th>
                                <th>ประเภทงานวิจัย</th>
                                <th>ชื่อประเภทงานวิจัย ภาษาไทย</th>
                                <th>ชื่อประเภทงานวิจัย ภาษาอังกฤษ</th>
                                <th>สถานะ</th>
                                <th>สร้างเมื่อ</th>
                                <th>แก้ไขเมือ</th>
                                <th width='15%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($research as $list)
                            <tr>
                                <td>{{ $list->research_types_id }}</td>
                                <td>{{ $list->typemain->type_main_name }}</td>
                                <td>{{ $list->types_name_th }}</td>
                                <td>{{ $list->types_name_en }}</td>
                                <td>
                                    @if ($list->types_status == 1)
                                    <h5><span class="badge badge-success">Enable</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">Disable</span></h5>
                                    @endif
                                </td>
                                <td>{{ $list->created_at }}</td>
                                <td>{{ $list->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin-general-research.destroy', $list->research_types_id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('admin-general-research.show', $list->research_types_id) }}"> <i class="far fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('admin-general-research.edit', $list->research_types_id) }}"><i class="far fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"> <i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    });

</script>
@endpush
