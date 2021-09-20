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
					หมวดหมู่หัวข้อวิจัย
					<div style="font-family: KanitRegular; font-weight: 300; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">Category research topic</div>
				</div>
				<div>
					<button
						type="button" class="btn btn-success"
						data-toggle="modal" data-target="#FormModal"
						onclick="$('#oForm input[name=id]').val('')"
					><i class="fas fa-plus"></i>&nbsp;&nbsp;เพิ่มหัวข้อวิจัยใหม่</button>
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
									หัวข้อวิจัย
									<input class="form-control" name="name" value="{{ $filter['name'] }}" type="text"/>
								</div>
							</div>
							<!-- <div class="col-3">
								<div class="form-group">
									รายละเอียดงานวิจัย
									<input class="form-control" name="details" value="{{ $filter['details'] }}" type="text"/>
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
										onclick="window.location.href='admin-shoppinglists-main';"
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
							<tr>
								<th style="width: 1px;"></th>
								<th style="width: 1px;"></th>
								<th>หัวข้อวิจัย<br/>TH / EN</th>
								<!-- <th>รายละเอียดงานวิจัย</th> -->
								<th style="width: 1px; white-space: nowrap;">อัพเดทเมื่อ</th>
								<th style="width: 1px; white-space: nowrap;">สถานะ</th>
								<th style="width: 1px;"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rs as $list)
							<tr>
								<td style="text-align: center;">{{ $loop->index + 1 }}</td>
								<td>
									<a href="{{ asset($list->shopping_cat_filepath1) }}" target="_blank">
										<img src="{{ asset($list->shopping_cat_filepath1) }}" style="width: 48px; border-radius: 8px;"/>
									</a>
								</td>
								<td style="white-space: nowrap;">
									{{ $list->shopping_category_name_th }}<br/>
									{{ $list->shopping_category_name_en }}
								</td>
								<!-- <td>
									{{ $list->shopping_category_details }}
								</td> -->
								<td style="text-align: right; white-space: nowrap;">
									{{ $list->updated_date }}<br/>
									{{ $list->updated_time }}
								</td>
								<td style="padding-right: 7px; text-align: right;">
									<label class="cl-switch cl-switch-green">
										<input
											type="checkbox"
											onchange="StatusChange( $(this), {{ $list->shopping_category_id }} )"
											@if($list->shopping_category_status) checked @endif
										/>
										<span class="switcher"></span>
										<span class="label"></span>
									</label>
								</td>
								<td>

									<div style="display: flex; justify-content: center; align-items: center;">

										<button
											type="button" class="btn btn-info btn-sm"
											onclick="InfoShow( {{ $list->shopping_category_id }} )"
											data-toggle="modal" data-target="#InfoModal"
										><i class="far fa-eye"></i></button>

										&nbsp;&nbsp;&nbsp;

										<button
											type="button" class="btn btn-warning btn-sm"
											onclick="FormShow( {{ $list->shopping_category_id }} )"
											data-toggle="modal" data-target="#FormModal"
										><i class="far fa-edit"></i></button>

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
				<h5 class="modal-title">หัวข้อวิจัย</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="oForm" method="post" enctype="multipart/form-data">
					<input name="id" value="" type="hidden"/>
					<input name="shopping_category_status" value="1" type="hidden"/>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<strong>Topic TH</strong>
								<input
									class="form-control" type="text"
									name="shopping_category_name_th"
									placeholder="กรอกหัวข้องานวิจัย"
								/>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<strong>Topic EN</strong>
								<input
									class="form-control" type="text"
									name="shopping_category_name_en"
									placeholder="Research topic"
								>
							</div>
						</div>
						<!-- <div class="col-12">
							<div class="form-group">
								<strong>Research Details</strong>
								<textarea
									class="form-control"
									name="shopping_category_details"
									placeholder="รายละเอียดงานวิจัย"
									style="height: 115px;"
								></textarea>
							</div>
						</div> -->
						<div class="col-6">
							<div class="form-group">
								<strong>Image 1</strong>
								<div class="custom-input-file">
									<input id="file1" type="file" name="file1" onchange="handleSingleFileChange(this)" accept="image/x-png,image/gif,image/jpeg"/>
									<label for="file1"><img src="{{ asset('backend/dist/img/plus.png') }}"/></label>
								</div>
								<div id="file1-name" style="width: 100%;"></div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<strong>Image 2</strong>
								<div class="custom-input-file">
									<input id="file2" type="file" name="file2" onchange="handleSingleFileChange(this)" accept="image/x-png,image/gif,image/jpeg"/>
									<label for="file2"><img src="{{ asset('backend/dist/img/plus.png') }}"/></label>
								</div>
								<div id="file2-name" style="width: 100%;"></div>
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
				<h5 class="modal-title">หัวข้อวิจัย</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<strong>Topic TH</strong>
							<div class="shopping_category_name_th"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Topic EN</strong>
							<div class="shopping_category_name_en"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>Research Details</strong>
							<div class="shopping_category_details"></div>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<strong>Image 1</strong>
							<img class="file1" style="width: 100%; border-radius: 8px;"/>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<strong>Image 2</strong>
							<img class="file2" style="width: 100%; border-radius: 8px;"/>
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
<!-- Page specific script -->

<link rel="stylesheet" href="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.css') }}" />
<!-- <script type="text/javascript" src="{{ asset('backend/dist/js/jquery-ui-1.12.1/external/jquery/jquery.js') }}"></script> -->
<script src="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

<script>

	function InfoShow(id){

		var InfoModal = $("#InfoModal");

		$.ajax({
			type: "GET",
			url: "admin-shoppinglists-main/"+id,
			cache: false,
			success: function(rs){ //console.log(rs);
				InfoModal.find(".shopping_category_name_th").html(rs.shopping_category_name_th);
				InfoModal.find(".shopping_category_name_en").html(rs.shopping_category_name_en);
				InfoModal.find(".shopping_category_details").html(rs.shopping_category_details);
				if( rs.shopping_cat_filepath1 ){
					InfoModal.find(".file1").attr("src","assets/images/"+rs.shopping_cat_filepath1);
				}else{
					InfoModal.find(".file1").attr("src","");
				}
				if( rs.shopping_cat_filepath2 ){
					InfoModal.find(".file2").attr("src","assets/images/"+rs.shopping_cat_filepath2);
				}else{
					InfoModal.find(".file2").attr("src","");
				}
			}
		});

	}

	function FormShow(id){

		var oForm = $("#oForm");
		oForm.find("input[name=id]").val(id);

		$.ajax({
			type: "GET",
			url: "admin-shoppinglists-main/"+id,
			cache: false,
			success: function(rs){ //console.log(rs);
				oForm.find("input[name='shopping_category_name_th']").val(rs.shopping_category_name_th);
				oForm.find("input[name='shopping_category_name_en']").val(rs.shopping_category_name_en);
				oForm.find("textarea[name='shopping_category_details']").val(rs.shopping_category_details);
			}
		});

	}

	function FormSubmit(){

		var oSubmit = $("#FormModal .btn-submit");
		var oForm = $("#oForm");

		var InValids = new Array();

		if( !oForm.find("input[name='shopping_category_name_th']").val() ){
			oForm.find("input[name='shopping_category_name_th']").addClass("is-invalid");
			InValids.push("s");
		}else{
			oForm.find("input[name='shopping_category_name_th']").removeClass("is-invalid");
		}

		if( !oForm.find("input[name='shopping_category_name_en']").val() ){
			oForm.find("input[name='shopping_category_name_en']").addClass("is-invalid");
			InValids.push("s");
		}else{
			oForm.find("input[name='shopping_category_name_en']").removeClass("is-invalid");
		}

		// if( !oForm.find("textarea[name='shopping_category_details']").val() ){
		// 	oForm.find("textarea[name='shopping_category_details']").addClass("is-invalid");
		// 	InValids.push("s");
		// }else{
		// 	oForm.find("textarea[name='shopping_category_details']").removeClass("is-invalid");
		// }

		if( InValids.length == 0 ){

			var form = oForm[0];
			var formData = new FormData(form);

			oSubmit.addClass("loading");

			$.ajax({
				type: "post",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				url: "admin-shoppinglists-main",
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
			url: "admin-shoppinglists-main/"+id,
			data: { 
				"shopping_category_status": Status
			},
			cache: false,
			success: function(rs){ console.log(rs);
			}
		});
	}

	$(document).ready(function() {

		// DarkmodeSwitch();

		$(".datepicker").datepicker({
			dateFormat : "yy-mm-dd", 
			defaultDate : new Date()
		});

		$('#datatable').DataTable( {
			// dom: 'Blfrtip',
			// buttons: [
			// 	'excel', 'pdf', 'print'
			// ],
			dom: 'tip',
			buttons: [],
			columnDefs: [
				{ "targets": 1, "orderable": false },
				{ "targets": 3, "orderable": false },
				{ "targets": 4, "orderable": false },
				{ "targets": 5, "orderable": false }
			],
		});

	});

</script>

@endpush