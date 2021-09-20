@extends('layouts.app')

@push('page_css')

	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<style>

		.dataTables_length { float: left; }
		.dataTables_filter { float: right; }
		.dataTables_info { float: left; margin: 5px 0px 0px 0px !important; }
		.btn-group {
			position: relative;
			top: -6px;
			display: inline-block;
			margin: 0px 0px 0px 10px;
		}
		.btn-group > button {
			margin: 0px 5px 0px 5px;
			border-radius: .25rem !important;
		}
		.dataTables_paginate { margin: 20px 0px 0px 0px !important; }

		.filters {
			position: relative;
			display: flex; justify-content: flex-start; align-items: flex-start; flex-wrap: wrap;
		}
		.filters > .filter {
			padding: 10px 10px 0px 10px;
			width: 25%;
		}

	</style>

@endpush

@section('content')

<div class="container-fluid" style="padding: 10px 10px 10px 10px;">
	<div class="row">
		<div class="col-12" style="padding: 10px 10px 0px 10px;">
			<div style="display: flex; justify-content: center; align-items: center;">
				<div
					style="
						flex-grow: 1;
						font-family: KanitExtraLight; font-weight: 300; font-size: 28px;
						text-transform: uppercase;
						line-height: 25px;
					"
				>
					หัวข้อวิจัยเพิ่มเติม
					<div style="font-family: KanitRegular; font-weight: 300; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">
						Additional research topic
					</div>
				</div>
				<div>
				</div>
			</div>
		</div>
		<div class="col-12" style="padding: 10px 10px 0px 10px;">
			<div class="card">
				<div class="card-header">
					<form id="filter-form" method="get" enctype="multipart/form-data">
						<div class="row">
							<div class="col-3">
								<div class="form-group">
									หัวข้อวิจัยเพิ่มเติม
									<input class="form-control" name="name" value="{{ $filter['name'] }}" type="text"/>
								</div>
							</div>
							<!-- <div class="col-3">
								<div class="form-group">
									รายละเอียดการวิจัย
									<input class="form-control" name="details" value="{{ $filter['details'] }}" type="text"/>
								</div>
							</div> -->
							<div class="col-3">
								<div class="form-group">
									หัวข้อวิจัยหลัก
									<select class="form-control" name="category" value="{{ $filter['category'] }}">
										<option value="">เลือกหัวข้อวิจัยหลัก</option>
										@foreach ($rs_category as $r)
										<option
											value="{{ $r->shopping_category_id }}"
											@if( $r->shopping_category_id == $filter['category'] ) selected @endif
										>{{ $r->shopping_category_name_th }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<!-- <div class="col-3">
								<div class="form-group">
									ผู้เสนอ
									<select class="form-control" name="user" value="{{ $filter['user'] }}">
										<option value="">ผู้เสนอ</option>
										@foreach ($rs_users as $r)
										<option
											value="{{ $r->id }}"
											@if( $r->id == $filter['user'] ) selected @endif
										>{{ $r->name }} {{ $r->User_LName }}</option>
										@endforeach
									</select>
								</div>
							</div> -->
							<div class="col-3">
								<div class="form-group">
									วันที่สร้างเริ่ม
									<input class="form-control datepicker" name="begin" value="{{ $filter['begin'] }}" type="text"/>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									วันที่สร้างสิ้นสุด
									<input class="form-control datepicker" name="end" value="{{ $filter['end'] }}" type="text"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div style="float: left;">
									<button
										type="button" class="btn btn-secondary"
										onclick="window.location.href='admin-shoppinglists-additional';"
									><i class="fas fa-broom"></i>&nbsp;&nbsp;Clear</button>
								</div>
								<div style="float: right;">
									<button
										type="button" class="btn btn-primary"
										onclick="$('#filter-form').submit()"
									><i class="fas fa-search"></i>&nbsp;&nbsp;Search</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered table-striped">
						<thead>
							<tr style="white-space: nowrap;">
								<th style="width: 1px;"></th>
								<th>หัวข้อวิจัยหลัก<br/>TH / EN</th>
								<th>หัวข้อวิจัยเพิ่มเติม<br/>TH / EN</th>
								<th>ชื่อเต็มหัวข้อวิจัย</th>
								<th style="width: 75px; text-align: right;">อัพเดทเมื่อ</th>
								<th style="width: 1px; text-align: center; white-space: nowrap;">สถานะ<br/>การอนุมัติ</th>
								<th style="width: 1px;"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rs as $list)
							<tr>
								<td style="text-align: center;">{{ $loop->index + 1 }}</td>
								<td>
									<div>{{ $list->shopping_category_name_th }}</div>
									<div>{{ $list->shopping_category_name_en }}</div>
								</td>
								<td>
									<div>{{ $list->shopping_add_name_th }}</div>
									<div>{{ $list->shopping_add_name_en }}</div>
								</td>
								<td>
									{{ $list->shopping_add_full_name }}
								</td>
								<td style="text-align: right;">
									{{ $list->updated_date }}<br/>
									{{ $list->updated_time }}
								</td>
								<td style="padding-right: 5px; text-align: center;">
									<label class="cl-switch cl-switch-green">
										<input
											type="checkbox"
											onchange="StatusChange( $(this), {{ $list->shopping_add_id }} )"
											@if($list->shopping_list_status) checked @endif
										/>
										<span class="switcher"></span>
										<span class="label"></span>
									</label>
								</td>
								<td>

									<div style="display: flex; justify-content: center; align-items: center;">

										<button
											type="button" class="btn btn-info btn-sm"
											onclick="InfoShow( {{ $list->shopping_add_id }} )"
											data-toggle="modal" data-target="#InfoModal"
										><i class="far fa-eye"></i></button>

										&nbsp;&nbsp;&nbsp;

										<button
											type="button" class="btn btn-danger btn-sm"
											onclick="RecordRemove( {{ $list->shopping_add_id }} )"
										><i class="fas fa-trash"></i></button>

									</div>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- InfoModal -->
<div class="modal fade" id="InfoModal" tabindex="-1" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">หัวข้อวิจัยเพิ่มเติม</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<strong>Main research topic</strong>
							<div class="category_name"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research topic TH</strong>
							<div class="shopping_add_name_th"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research topic EN</strong>
							<div class="shopping_add_name_en"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Full research name</strong>
							<div class="shopping_add_full_name"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research details</strong>
							<div class="shopping_add_details"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Creator</strong>
							<div class="user"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Approver</strong>
							<div class="admin"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('page_scripts')

<!-- DataTables & Plugins -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.0/sp-1.4.0/sl-1.3.3/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.0/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

<link rel="stylesheet" href="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.css') }}" />
<script src="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<!-- Page specific script -->

<script>

	function InfoShow(id){

		var InfoModal = $("#InfoModal");

		$.ajax({
			type: "GET",
			url: "admin-shoppinglists-additional/"+id,
			cache: false,
			success: function(rs){ console.log(rs);
				InfoModal.find(".category_name").html(rs.category_name);
				InfoModal.find(".shopping_add_name_th").html(rs.shopping_add_name_th);
				InfoModal.find(".shopping_add_name_en").html(rs.shopping_add_name_en);
				InfoModal.find(".shopping_add_full_name").html(rs.shopping_add_full_name);
				InfoModal.find(".shopping_add_details").html(rs.shopping_add_details);
				InfoModal.find(".user").html(rs.user_name);
				InfoModal.find(".admin").html(rs.admin_name);
			}
		});

	}

	function StatusChange(oThis,id){
		let IsChecked = oThis.prop("checked");
		let Status = 0;
		if ( IsChecked ) Status = 1;
		$.ajax({
			type: "PUT",
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: "admin-shoppinglists-additional/"+id,
			data: { 
				"admin_approved_id": {{ Auth::user()->admin_id }},
				"shopping_list_status": Status
			},
			cache: false,
			success: function(rs){ console.log(rs);
			}
		});
	}

	function RecordRemove(id){
		Swal.fire({
			title: 'ต้องการลบข้อมูล<br/>ออกจากฐานข้อมูลหรือไม่?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'ยืนยันการลบ', confirmButtonColor: '#3085d6',
			cancelButtonText: 'ยกเลิก', cancelButtonColor: '#d33'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "DELETE",
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					url: "admin-shoppinglists-additional/"+id,
					cache: false,
					success: function(rs){ console.log(rs);
						Swal.fire( 'ลบสำเร็จ!' )
						window.location.reload();
					}
				});
			}
		})
	}

	$(document).ready(function() {

		$(".datepicker").datepicker({
			dateFormat : "yy-mm-dd", 
			defaultDate : new Date()
		});

		$('#datatable').DataTable( {
			dom: 'tip',
			buttons: [],
			// dom: 'Blfrtip',
			// buttons: [
			// 	'excel', 'pdf', 'print'
			// ],
			columnDefs: [
				{ "targets": 3, "orderable": false },
				{ "targets": 4, "orderable": false },
				{ "targets": 5, "orderable": false },
				{ "targets": 6, "orderable": false }
			],
		});

	});

</script>

@endpush