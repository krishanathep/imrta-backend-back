@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลแหล่งงบประมาณ</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Budget Source</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ลำดับ</td>
                                <td>{{ $budget->budget_id }}</td>
                            </tr>
                            <tr>
                                <td>อักษรย่อ</td>
                                <td>{{ $budget->budget_prefix }}</td>
                            </tr>
                            <tr>
                                <td>ชื่อแหล่งงบประมาณ ภาษาไทย</td>
                                <td>{{ $budget->budget_name_TH }}</td>
                            </tr>
                            <tr>
                                <td>ชื่อแหล่งงบประมาณ ภาษาอังกฤษ</td>
                                <td>{{ $budget->budget_name_EN }}</td>
                            </tr>
                            <tr>
                                <td>ประเภทงบประมาณ</td>
                                <td>{{ $budget->budget_type }}</td>
                            </tr>
                            <tr>
                                <td>วันที่สร้าง</td>
                                <td>{{ $budget->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>วันที่อัพเดท</td>
                                <td>{{ $budget->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-general-budget.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
