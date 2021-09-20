@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลประเภทสถานะ</h3>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">View Type Status</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ลำดับ</td>
                            <td>{{ $status->type_status_id }}</td>
                        </tr>
                        <tr>
                            <td>โครงการหลัก</td>
                            <td>{{ $status->typemain->type_main_name }}</td>
                        </tr>
                        <tr>
                            <td>โครงการรอง</td>
                            <td>{{ $status->typesub->type_sub_name }}</td>
                        </tr>
                        <tr>
                            <td>ชื่อสถานะ</td>
                            <td>{{ $status->type_status_text }}</td>
                        </tr>
                        <!--
                        <tr>
                            <td>Type Action</td>
                            <td>{{ $status->type_status_action }}</td>
                        </tr>
                         -->
                        <tr>
                            <td>สถานะ</td>
                            <td>
                                @if ($status->status == 1)
                                <h5><span class="badge badge-success">Enable</span></h5>
                                @else
                                <h5><span class="badge badge-danger">Disible</span></h5>
                                @endif
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <td>Cratet at</td>
                            <td>{{ $status->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Update at</td>
                            <td>{{ $status->updated_at }}</td>
                        </tr>
                    -->
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-general-status.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
