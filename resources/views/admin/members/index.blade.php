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
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลผู้ใช้</h3>
            </div>
            <div class="float-right">
                <!--<a class="btn btn-success mt-2" href="{{ route('admin-members.create') }}"> <i
                            class="fas fa-plus"></i> Create </a>-->
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Members</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>บัญชีผู้ใช้</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>แผนก</th>
                                <th>ตำแหน่ง</th>
                                <th>กลุ่ม</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>สถานะ</th>
                                <th>วันที่สมัคร</th>
                                <th>วันที่แก้ไข</th>
                                <th width='15%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->prefix->prefix_name_th }} {{ $member->name }} {{ $member->User_LName }}</td>
                                <td>{{ $member->department->department_name }}</td>
                                <td>{{ $member->user_position }}</td>
                                <td>{{ $member->groupuser->user_group_name }}</td>
                                <td>{{ $member->User_Mobile }}</td>
                                <td>
                                    @if ($member->User_Status===1)
                                    <h5><span class="badge badge-success">Enable</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">Disable</span></h5>
                                    @endif
                                </td>
                                <td>{{ $member->created_at }}</td>
                                <td>{{ $member->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin-members.destroy', $member->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('admin-members.show', $member->id) }}"> <i class="far fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('admin-members.edit', $member->id) }}"><i class="far fa-edit"></i></a>
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
            //"buttons": ["excel"]
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
