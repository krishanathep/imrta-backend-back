@extends('layouts.app')
@section('content')
<style>
    .card {
        margin-bottom: 30px;
    }

    .border_bottom {
        border-bottom: 2px solid #dee2e6;
    }

    .border_top {
        border-top: 2px solid #dee2e6;
    }

    tr td {
        padding: .5rem .5rem;
    }

    .form-label {
        font-weight: bold;
    }
</style>

<div class="container pt-4 pb-4">
    <div class="text-start mt-4 mb-4">
        <a class="btn btn-primary btn-lg" href="{{ route('admin-progress.index') }}">ย้อนกลับ</a>
    </div>
    <div class="mx-auto">
        <div class="text-center">
            <div class="p-3 mb-3">
                <h2>แบบติดตามโครงการวิจัยที่ได้รับสนับสนุนงบประมาณจากกองทุนสนับสนุนวิชาการ กรมการแพทย์</h2>
            </div>
        </div>
        <div class="container">

                @if ( $user )
                <div class="row">
                    <div class="col-md-6"><b>ชื่อผู้ให้ข้อมูล</b> : {{ $user->name ?? null }} {{ $user->User_LName ?? null }}</div>
                    <div class="col-md-6"><b>ตำแหน่ง</b> : {{ $user->user_position ?? null }}</div>
                    <div class="col-md-6"><b>ชื่อหน่วยงาน</b> : {{ $user->department ? $user->department->department_name : null }}</div>
                    <div class="col-md-6"><b>เบอร์โทรศัพท์</b> : {{ $user->User_Phone ?? null }} / {{ $user->User_Mobile ?? null }}</div>
                    <div class="col-md-6"><b>อีเมล</b> : {{ $user->email ?? null }}</div>
                </div>
                @endif

                <hr>

                <div class="mb-4">
                    {{-- <div><b>ชื่อโครงการ</b>: [{{ $PS->proposal_sub_code ?? null}}] {{ $PS->PDApprove->PD->proposal_dev_name }}</div> --}}
                    <div class="row">
                        @php
                            $timeline = $PS->getTimeline();
                        @endphp
                        <div class="col-md-6"><b>ประเภทงานวิจัย</b>: {{ $PS->research ? $PS->research->types_name_en : null }}</div>
                        <div class="col-md-6"><b>ผู้รับผิดชอบโครงการ</b>: {{ $PS->user->fullname() }}</div>
                        <div class="col-md-6"><b>ระยะเวลาดำเนินการ</b>: {{ $timeline['year'] }} ปี ({{ \Carbon\Carbon::parse($timeline['start'])->thaidate().' - '.\Carbon\Carbon::parse($timeline['end'])->thaidate() }})</div>
                        {{-- <div class="col-md-6"><b>ระยะเวลาดำเนินการ</b>: {{ $timeline['year'] }} ปี ({{ \Carbon\Carbon::parse($timeline['start'])->thaidate().' - '.\Carbon\Carbon::parse($timeline['end'])->thaidate() }})</div> --}}
                        <div class="col-md-6"><b>งบประมาณ (บาท)</b>: {{ number_format($PS->getBudgetOnFormData()) }}</div>
                    </div>
                </div>

                <hr class="mb-4">
                <div>
                    <div class="text-center mb-2"><strong>ตารางรายงานความก้าวหน้าของโครงการ</strong></div>
                    <table class="table table-striped table-hover">
                        <thead class="border-top">
                            <tr class="table-danger">
                                <th scope="col" class="text-center">ลำดับ</th>
                                <th scope="col">ผลการดำเนินงาน</th>
                                <th scope="col">ปัญหา/อุปสรรคในการดำเนินโครงการ</th>
                                <th scope="col" class="text-center">ความก้าวหน้า (%)</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                <th scope="col" class="text-center">วันที่สรุปข้อมูล</th>
                                <th scope="col" class="text-center">วันที่บันทึก</th>
                                <th scope="col" class="text-end">งบประมาณใช้แล้ว</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $progresses as $progress )
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $progress->project_prograss_details }}</td>
                                    <td>{{ $progress->project_prograss_problems }}</td>
                                    <td class="text-center">{{ $progress->project_prograss_percent }}%</td>
                                    <td class="text-center">{{ $progress->typeStatus->type_status_text }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($progress->progress_date)->thaidate() }}</td>
                                    <td class="text-center">{{ $progress->created_at->thaidate() }}</td>
                                    <td class="text-end">{{ number_format($progress->project_prograss_expense_budget) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">-- ไม่พบข้อมูล --</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr style="border-bottom: 3px double;">
                                <td colspan="7"></td>
                                <td class="text-end">{{ number_format($progresses->sum('project_prograss_expense_budget')) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

        </div>
    </div>
</div>

@endsection
