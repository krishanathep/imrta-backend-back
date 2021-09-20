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
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ประเภทสถานะ</h3>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Type Status</h3>
                </div>
                <!-- /.delets button create -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>ลำดับ</th>
                                <th>โครงการหลัก</th>
                                <th>โครงการรอง</th>
                                <th>ชื่อสถานะ</th>
                                <th>สถานะ</th>
                                <th width='15%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $list)
                            <tr>
                                <td>{{ $list->type_status_id }}</td>
                                <td>{{ $list->typemain->type_main_name }}</td>
                                <td>{{ $list->typesub->type_sub_name }}</td>
                                <td>{{ $list->type_status_text }}</td>
                                <td>
                                    @if ($list->status == 1)
                                    <h5><span class="badge badge-success">Enable</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">Disible</span></h5>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin-general-status.destroy', $list->type_status_id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('admin-general-status.show', $list->type_status_id) }}"> <i class="far fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('admin-general-status.edit', $list->type_status_id) }}"><i class="far fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <!--
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"> <i class="far fa-trash-alt"></i></button>
                                        -->
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
    function StatusChange(oThis,id){
		let IsChecked = oThis.prop("checked");
		let Status = 0;
		if ( IsChecked ) Status = 1;
		$.ajax({
			type: "PUT",
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: "admin-shoppinglists-main/"+id,
			data: { 
				"shopping_category_status": Status
			},
			cache: false,
			success: function(rs){ console.log(rs);
			}
		});
    }  
    
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
