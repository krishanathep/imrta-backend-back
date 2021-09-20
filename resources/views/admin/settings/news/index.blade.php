@extends('layouts.app') 

@push('page_css') 
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข่าวสาร</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success mt-2" href="{{ route('admin-setting-news.create') }}"> <i class="fas fa-plus"></i> Create </a>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">News Lists</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>หัวข้อข่าวสาร</th>
                                        <th>ที่มาของข่าวสาร</th>
                                        <th>สถานะ</th>
                                        <th>วันที่สร้าง</th>
                                        <th>วันที่แก้ไข</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <!--
                                        <td>{{ Str::limit($item->detail, 100) }}</td>
                                        -->
                                        <td>{{ $item->detail }}</td>
                                        <td>
                                            <label class="cl-switch cl-switch-green">
                                                <input
													class="checkbox-status"
                                                    type="checkbox"
                                                    onchange="StatusChange( $(this), {{ $item->id }} )"
													onclick="StatusClick( $(this), {{ $item->id }} )"
                                                    @if($item->status) checked @endif
                                                />
                                                <span class="switcher"></span>
                                                <span class="label"></span>
                                            </label>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin-setting-news.destroy', $item->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('admin-setting-news.show', $item->id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('admin-setting-news.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
			type: "post",
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: "admin-setting-news/status/"+id,
			data: { 
				"status": Status
			},
			cache: false,
			success: function(rs){ console.log(rs);
			}
		});
	}

	function StatusClick(oThis,id){
		$(".checkbox-status").prop("checked", false);
		oThis.prop("checked", true);
		$(".checkbox-status").trigger("change");
	}

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