@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลประเภทโครงการวิจัย</h3>
            </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">View Research Type</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ลำดับ</td>
                            <td>{{ $research->research_types_id }}</td>
                        </tr>
                        <tr>
                            <td>ประเภทงานวิจัย</td>
                            <td>{{ $research->typemain->type_main_name }}</td>
                        </tr>
                        <tr>
                            <td>ชื่อประเภทงานวิจัย ภาษาไทย</td>
                            <td>{{ $research->types_name_th }}</td>
                        </tr>
                        <tr>
                            <td>ประเภทงานวิจัย ภาษาอังกฤษ</td>
                            <td>{{ $research->types_name_en }}</td>
                        </tr>
                        <tr>
                            <td>สถานะ</td>
                            <td>
                                @if ($research->types_status == 1)
                                <h5><span class="badge badge-success">Enable</span></h5>
                                @else
                                <h5><span class="badge badge-danger">Disable</span></h5>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>สร้างเมื่อ</td>
                            <td>{{ $research->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>วันที่แก้ไข</td>
                            <td>{{ $research->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-general-research.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
