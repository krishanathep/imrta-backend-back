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
					หัวข้อวิจัย
					<div style="font-family: KanitRegular; font-weight: 300; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">
						Main research topic
					</div>
				</div>
				<div>
					<button
						type="button" class="btn btn-success"
						data-toggle="modal" data-target="#FormModal"
						onclick="$('#oForm input[name=id]').val('')"
					><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มหัวข้อวิจัยรอง</button>
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
									หัวข้อวิจัยรอง
									<input class="form-control" name="name" value="{{ $filter['name'] }}" type="text"/>
								</div>
							</div>
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
							<div class="col-3">
								<div class="form-group">
									สถานะ
									<select class="form-control" name="status">
										<option>เลือกสถานะ</option>
										<option value="1" {{ ( $filter["status"] == 1 ) ? "selected" : "" }} >เปิดใช้งาน</option>
										<option value="0" {{ ( $filter["status"] == 0 ) ? "selected" : "" }} >ปิดใช้งาน</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div style="float: left;">
									<button
										type="button" class="btn btn-secondary"
										onclick="window.location.href='admin-shoppinglists-secondary';"
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
								<th>หัวข้อวิจัยรอง<br/>TH / EN</th>
								<th>ชื่อเต็มหัวข้อวิจัย</th>
								<th>เอกสารงานวิจัย</th>
								<th style="width: 75px; text-align: right;">อัพเดทเมื่อ</th>
								<th style="width: 50px; text-align: center;">สถานะ</th>
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
									<div>{{ $list->branch_name_th }}</div>
									<div>{{ $list->branch_name_en }}</div>
								</td>
								<td>
									{{ $list->branch_full_name }}
								</td>
								<td>
									@if ( $list->branch_part != "" )
									<a href="{{ asset('assets/pdf/'.$list->branch_part) }}" target="_blank">
										{{ $list->branch_details_file_name }}
									</a>
									@endif
								</td>
								<td style="text-align: right;">
									{{ $list->updated_date }}<br/>
									{{ $list->updated_time }}
								</td>
								<td style="padding-right: 7px; text-align: right;">
									<label class="cl-switch cl-switch-green">
										<input
											type="checkbox"
											onchange="StatusChange( $(this), {{ $list->running_no }} )"
											@if($list->branch_status) checked @endif
										/>
										<span class="switcher"></span>
										<span class="label"></span>
									</label>
								</td>
								<td>

									<div style="display: flex; justify-content: center; align-items: center;">

										<button
											type="button" class="btn btn-info btn-sm"
											onclick="InfoShow( {{ $list->running_no }} )"
											data-toggle="modal" data-target="#InfoModal"
										><i class="far fa-eye"></i></button>

										&nbsp;&nbsp;&nbsp;

										<button
											type="button" class="btn btn-warning btn-sm"
											onclick="FormShow( {{ $list->running_no }} )"
											data-toggle="modal" data-target="#FormModal"
										><i class="far fa-edit"></i></button>

										&nbsp;&nbsp;&nbsp;

										<button
											type="button" class="btn btn-danger btn-sm"
											onclick="RecordRemove( {{ $list->running_no }} )"
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

<!-- FormModal -->
<div class="modal fade" id="FormModal" tabindex="-1" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">หัวข้อวิจัยรอง</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="oForm" method="post" enctype="multipart/form-data">
					<input name="id" value="" type="hidden"/>
					<input name="branch_status" value="1" type="hidden"/>
					<input name="shopping_branch_id" value="0" type="hidden"/> <!-- ไม่ได้ใช้ ฐานข้อมูลบังคับให้ใส่เฉยๆ -->
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<strong>หัวข้อวิจัยหลัก</strong>
								<select class="form-control" name="shopping_category_id">
									@foreach ($rs_category as $r)
									<option
										value="{{ $r->shopping_category_id }}"
									>{{ $r->shopping_category_name_th }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<strong>Research topic TH</strong>
								<input
									class="form-control" type="text"
									name="branch_name_th"
									placeholder="กรอกหัวข้องานวิจัยรอง"
								/>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<strong>Research topic EN</strong>
								<input
									class="form-control" type="text"
									name="branch_name_en"
									placeholder="Secondary research topic"
								/>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<strong>Research topic full name</strong>
								<textarea
									class="form-control"
									name="branch_full_name"
									placeholder="ชื่อเต็มงานวิจัย"
									style="height: 115px;"
								></textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<strong>Research document</strong>
								<div><input type="file" name="file1"/></div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-close" data-dismiss="modal"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Close</button>
				<button type="button" class="btn btn-primary btn-submit" onclick="FormSubmit()">
					<span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					<i class="far fa-check-circle"></i>&nbsp;&nbsp;Save changes
				</button>
			</div>
		</div>
	</div>
</div>

<!-- InfoModal -->
<div class="modal fade" id="InfoModal" tabindex="-1" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">หัวข้อวิจัยรอง</h5>
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
							<div class="branch_name_th"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research topic EN</strong>
							<div class="branch_name_en"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Full research name</strong>
							<div class="branch_full_name"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research document</strong>
							<div class="branch_part"></div>
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
			url: "admin-shoppinglists-secondary/"+id,
			cache: false,
			success: function(rs){ console.log(rs);
				InfoModal.find(".category_name").html(rs.category_name);
				InfoModal.find(".branch_name_th").html(rs.branch_name_th);
				InfoModal.find(".branch_name_en").html(rs.branch_name_en);
				InfoModal.find(".branch_full_name").html(rs.branch_full_name);
				InfoModal.find(".branch_part").html('<a href="assets/pdf/'+rs.branch_part+'" target="_blank">'+rs.branch_details_file_name+'</a>');
			}
		});

	}

	function FormShow(id){

		var oForm = $("#oForm");
		oForm.find("input[name=id]").val(id);

		$.ajax({
			type: "GET",
			url: "admin-shoppinglists-secondary/"+id,
			cache: false,
			success: function(rs){ //console.log(rs);
				oForm.find("input[name='branch_name_th']").val(rs.branch_name_th);
				oForm.find("input[name='branch_name_en']").val(rs.branch_name_en);
				oForm.find("textarea[name='branch_full_name']").val(rs.branch_full_name);
			}
		});

	}

	function FormSubmit(){

		var oSubmit = $("#FormModal .btn-submit");
		var oForm = $("#oForm");

		var InValids = new Array();

		if( !oForm.find("input[name='branch_name_th']").val() ){
			oForm.find("input[name='branch_name_th']").addClass("is-invalid");
			InValids.push("s");
		}else{
			oForm.find("input[name='branch_name_th']").removeClass("is-invalid");
		}

		if( !oForm.find("input[name='branch_name_en']").val() ){
			oForm.find("input[name='branch_name_en']").addClass("is-invalid");
			InValids.push("s");
		}else{
			oForm.find("input[name='branch_name_en']").removeClass("is-invalid");
		}

		if( !oForm.find("textarea[name='branch_full_name']").val() ){
			oForm.find("textarea[name='branch_full_name']").addClass("is-invalid");
			InValids.push("s");
		}else{
			oForm.find("textarea[name='branch_full_name']").removeClass("is-invalid");
		}

		if( InValids.length == 0 ){

			var form = oForm[0];
			var formData = new FormData(form);

			oSubmit.addClass("loading");

			$.ajax({
				type: "post",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				url: "admin-shoppinglists-secondary",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rs){ console.log(rs);
					$("#FormModal .btn-close").click();
					oSubmit.removeClass("loading");
					window.location.reload();
				}
			})

		}

	}

	function StatusChange(oThis,id){
		let IsChecked = oThis.prop("checked");
		let Status = 0;
		if ( IsChecked ) Status = 1;
		$.ajax({
			type: "PUT",
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: "admin-shoppinglists-secondary/"+id,
			data: { 
				"branch_status": Status
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
					url: "admin-shoppinglists-secondary/"+id,
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

		// DarkmodeSwitch();

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
				{ "targets": 4, "orderable": false },
				{ "targets": 5, "orderable": false },
				{ "targets": 6, "orderable": false },
				{ "targets": 7, "orderable": false }
			],
		});

	});

</script>

@endpush