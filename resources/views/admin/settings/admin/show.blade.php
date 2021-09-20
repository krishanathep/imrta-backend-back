@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลผู้ใช้งานระบบ</h3>
            </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">View Prefix</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ลำดับ</td>
                            <td>{{ $admin->admin_id }}</td>
                        </tr>
                        <tr>
                            <td>บัญชีผู้ใช้ระบบ</td>
                            <td>{{ $admin->username }}</td>
                        </tr>
                        <tr>
                            <td>ชื่อผู้ใช้ระบบ</td>
                            <td>{{ $admin->admin_name }}</td>
                        </tr>
                        <tr>
                            <td>สถานะ</td>
                            <td>
                                @if ($admin->status == 1)
                                <h5><span class="badge badge-success">Enable</span></h5>
                                @else
                                <h5><span class="badge badge-danger">Disable</span></h5>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>วันที่สมัคร</td>
                            <td>{{ $admin->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>วันที่แก้ไข</td>
                            <td>{{ $admin->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-setting-admin.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
