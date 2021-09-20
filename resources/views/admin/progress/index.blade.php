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
					ความก้าวหน้าโครงการ
					<div style="font-family: KanitRegular; font-weight: 300; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">
						Project progress
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
									รหัสงานวิจัย
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
							{{-- <div class="col-3">
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
							</div> --}}
						</div>
						<div class="row">
							<div class="col-12">
								<div style="float: left;">
									<button
										type="button" class="btn btn-secondary"
										onclick="window.location.href='admin-progress';"
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
                                <th>#</th>
                                <th>รหัสงานวิจัย</th>
                                <th>หัวข้องานวิจัย TH/EN</th>
                                <th>ประเภทงานวิจัย</th>
                                <th>ความก้าวหน้าของโครงการ</th>
                                <th>งบที่ขอทั้งหมด</th>
                                <th>งบที่ใช้จ่าย</th>
                                <th>อัพเดทเมื่อ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ( $research_progresses as $key => $progress )
                                @php
                                    $PS = $progress->first()->PS ? $progress->first()->PS : null;
                                    $PD = null;
                                    if ( $PS != null) {
                                        if ( $PS->approved ) {
                                            $PD = $PS->approved->PD;
                                        }
                                    }
                                @endphp

                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $PS != null ? $PS->proposal_sub_code : null }}
                                    </td>
                                    <td>
                                        {{ $PD != null ? $PD->proposal_dev_name : null }}
                                    </td>
                                    <td>
                                        @php
                                            $research_type_name = $PS != null && $PS->researchType ? $PS->researchType->types_name_en : null;
                                            $type_main_name     = $PS != null && $PS->typeMain     ? $PS->typeMain->type_main_name    : null;
                                            $type_sub_name      = $PS != null && $PS->typeSub      ? $PS->typeSub->type_sub_name      : null;
                                        @endphp

                                        {{ $research_type_name }} {{ $type_main_name }} {{ $type_sub_name }}
                                    </td>
                                    <td>
                                        {{ $progress->first()->typeStatus->type_status_text }}
                                    </td>
                                    <td>
                                        {{ number_format($PS->getBudgetOnFormData()) }}
                                    </td>
                                    <td>
                                        {{ number_format($progress->sum('project_prograss_expense_budget')) }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($progress->first()->created_at) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-progress.show', $key) }}" class="btn btn-info btn-sm">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>

                        <tfoot></tfoot>
                    </table>




					{{-- <table id="datatable" class="table table-bordered table-striped">
						<thead>
							<tr style="white-space: nowrap;">
								<th style="width: 1px;"></th>
								<th style="width: 1px;">เลขที่</th>
								<th>หัวข้องานวิจัย<br/>TH / EN</th>
								<th>ประเภทงานวิจัย</th>
								<th>ความก้าวหน้าของโครงการ</th>
								<th style="width: 1px; text-align: right;">งบประมาณ<br/>ค่าใช้จ่ายที่ใช้</th>
								<th style="width: 1px; text-align: right;">อัพเดทเมื่อ</th>
								<th style="width: 1px; white-space: nowrap;">สถานะ</th>
								<th style="width: 1px;"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rs as $list)
							<tr>
								<td style="text-align: center;">{{ $loop->index + 1 }}</td>
								<td style="white-space: nowrap;">
									{{ $list->proposal_sub_code }}
								</td>
								<td>
									<div>{{ $list->proposal_dev_name_th }}</div>
									<div>{{ $list->proposal_dev_name_en }}</div>
								</td>
								<td>
									{{ $list->research_type_name }}
								</td>
								<td>
									{{ $list->project_prograss_type }}
								</td>
								<td style="text-align: right;">
									{{ number_format($list->project_prograss_expense_budget) }}
								</td>
								<td style="text-align: right;">
									{{ $list->updated_date }}<br/>
									{{ $list->updated_time }}
								</td>
								<td style="padding-right: 5px; text-align: center;">
									<label class="cl-switch cl-switch-green">
										<input
											type="checkbox"
											onchange="StatusChange( $(this), {{ $list->project_prograss_id }} )"
											@if($list->project_prograss_active) checked @endif
										/>
										<span class="switcher"></span>
										<span class="label"></span>
									</label>
								</td>
								<td>

									<div style="display: flex; justify-content: center; align-items: center;">

										<button
											type="button" class="btn btn-info btn-sm"
											onclick="InfoShow( {{ $list->proposal_sub_id }} )"
											data-toggle="modal" data-target="#InfoModal"
										><i class="far fa-eye"></i></button>

									</div>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table> --}}


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
				<h5 class="modal-title">ความคืบหน้างานวิจัย</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<strong>ผู้ Update โครงการ</strong>
							<div class="pp_user_name"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>ชื่อหัวข้อ Proposal submission</strong>
							<div class="proposal_name"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>ความก้าวหน้าของโครงการ</strong>
							<div class="project_prograss_type"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>งบประมาณค่าใช้จ่ายที่ใช้</strong>
							<div class="project_prograss_expense_budget"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>รายละเอียดความก้าวหน้า ผลการดำเนินงาน</strong>
							<div class="project_prograss_details"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>ปัญหา / อุปสรรค ในการดำเนินโครงการ</strong>
							<div class="project_prograss_problems"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<strong>ความก้าวหน้า %</strong>
							<div class="project_prograss_percent"></div>
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
			url: "admin-progress/"+id,
			cache: false,
			success: function(rs){ console.log(rs);
				InfoModal.find(".pp_user_name").html(rs.pp_user_name);
				InfoModal.find(".proposal_name").html(rs.proposal_dev_name_th+"<br/>"+rs.proposal_dev_name_en);
				InfoModal.find(".project_prograss_type").html(rs.project_prograss_type);
				InfoModal.find(".project_prograss_expense_budget").html(rs.project_prograss_expense_budget);
				InfoModal.find(".project_prograss_details").html(rs.project_prograss_details);
				InfoModal.find(".project_prograss_problems").html(rs.project_prograss_problems);
				InfoModal.find(".project_prograss_percent").html(rs.project_prograss_percent);
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
			url: "admin-progress/"+id,
			data: {
				"project_prograss_active": Status
			},
			cache: false,
			success: function(rs){ console.log(rs);
			}
		});
	}

	$(document).ready(function() {

		$(".datepicker").datepicker({
			dateFormat : "yy-mm-dd",
			defaultDate : new Date()
		});

		$('#datatable').DataTable( {
			dom: 'Blfrtip',
			buttons: [
				'excel', 'print'
				// 'excel', 'pdf', 'print'
			],
			columnDefs: [
				{ "targets": 4, "orderable": false },
			],
		});

	});

</script>

@endpush
