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
					เสนองานวิจัย
					<div style="font-family: KanitRegular; font-weight: 300; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">
						Proposal development
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
									เลขที่โครงการ
									<input class="form-control" name="name" value="{{ $filter['name'] }}" type="text"/>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									ประเภทงานวิจัย
									<select class="form-control" name="research_type" value="{{ $filter['research_type'] }}">
										<option value="">เลือกหัวข้อวิจัยหลัก</option>
										@foreach ($rs_research_types as $r)
										<option
											value="{{ $r->research_types_id }}"
											@if( $r->research_types_id == $filter['research_type'] ) selected @endif
										>{{ $r->types_name_th }}</option>
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
						</div>
						<div class="row">
							<div class="col-12">
								<div style="float: left;">
									<button
										type="button" class="btn btn-secondary"
										onclick="window.location.href='admin-proposal-development';"
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
								<th style="width: 1px;">เลขที่</th>
								<th>หัวข้องานวิจัย<br/>TH / EN</th>
								<th>ประเภทงานวิจัย</th>
								<th style="width: 75px; text-align: right;">อัพเดทเมื่อ</th>
								<th style="width: 50px; text-align: center;">สถานะ</th>
								<th style="width: 1px;"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rs as $list)
							<tr>
								<td style="text-align: center;">{{ $loop->index + 1 }}</td>
								<td style="white-space: nowrap;">
									{{ $list->proposal_dev_code }}
								</td>
								<td>
									<div>{{ $list->proposal_dev_name_th }}</div>
									<div>{{ $list->proposal_dev_name_en }}</div>
								</td>
								<td>
									<div>{{ $list->research_type_name }}</div>
									<div>{{ $list->research_type_main_name }}</div>
									<div>{{ $list->research_type_sub_name }}
								</td>
								<td style="text-align: right;">
									{{ $list->updated_date }}<br/>
									{{ $list->updated_time }}
								</td>
								<td style="min-width: 240px;">
									<select
										class="form-control"
										onchange="StatusSelectChange( $(this), {{ $list->pd_id }} )"
									>
										@foreach ($rs_status as $status)
											@if( $status->type_sub_id == $list->proposal_dev_type_sub_id )
											<option
												value="{{ $status->type_status_id }}"
												@if( $status->type_status_id == $list->proposal_dev_status_id ) selected @endif
											>
												{{ $status->type_status_text }}
												@if ( $status->is_notify )<span> [ แจ้งเตือน ]</span>@endif
											</option>
											@endif
										@endforeach
									</select>
								</td>
								<td>

									<div style="display: flex; justify-content: center; align-items: center;">

										<button
											type="button" class="btn btn-info btn-sm"
											onclick="InfoShow( {{ $list->pd_id }} )"
											data-toggle="modal" data-target="#InfoModal"
										><i class="far fa-eye"></i></button>

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
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">เสนองานวิจัย</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="report-tool">

					<button
						type="button" class="btn btn-info btn-sm"
						onclick="$('#report-container').printThis();"
					><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>

				</div>

				<div id="report-container" class="report-container"></div>

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

<script>

	function InfoShow(id){

		var InfoModal = $("#InfoModal");

		$.ajax({
			type: "GET",
			url: "admin-proposal-development/"+id,
			cache: false,
			success: function(rs){ console.log(rs);
				$("#InfoModal .report-container").html(rs);
			}
		});

	}

	function StatusSelectChange(oThis,id){
		let Status = oThis.val();
		if( confirm("ยืนยันการเปลี่ยนสถานะ") ){
			$.ajax({
				type: "PUT",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				url: "admin-proposal-development/"+id,
				data: {
					"proposal_dev_status_id": Status,
					"admin_id": "{{ Auth::user()->admin_id }}",
					"admin_name": "{{ Auth::user()->admin_name }}"
				},
				cache: false,
				success: function(rs){ console.log(rs);
				}
			});
		}
	}

	// function StatusChange(oThis,id){
	// 	let IsChecked = oThis.prop("checked");
	// 	let Status = 0;
	// 	if ( IsChecked ) Status = 1;
	// 	$.ajax({
	// 		type: "PUT",
	// 		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	// 		url: "admin-proposal-development/"+id,
	// 		data: {
	// 			"proposal_dev_status": Status
	// 		},
	// 		cache: false,
	// 		success: function(rs){ console.log(rs);
	// 		}
	// 	});
	// }

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
				{ "targets": 6, "orderable": false },
			],
		});

	});

</script>

@endpush
