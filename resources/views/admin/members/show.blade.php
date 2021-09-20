@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลสมาชิก</h3>
            </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">View Member</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>บัญชีผู้ใช้</td>
                            <td>{{ $members->email }}</td>
                        </tr>
                        <tr>
                            <td>ชื่อผู้ใช้</td>
                            <td>{{ $members->prefix->prefix_name_th }} {{ $members->name }} {{ $members->User_LName }}</td>
                        </tr>
                        <tr>
                            <td>แผนก</td>
                            <td>{{ $members->department->department_name }}</td>
                        </tr>
                        <tr>
                            <td>ตำแหน่ง</td>
                            <td>{{ $members->user_position }}</td>
                        </tr>
                        <tr>
                            <td>กลุ่ม</td>
                            <td>{{ $members->groupuser->user_group_name }}</td>
                        </tr>
                        <tr>
                            <td>เบอร์โทร</td>
                            <td>{{ $members->User_Mobile }}</td>
                        </tr>
                        <tr>
                            <td>สถานะ</td>
                            <td>
                                @if ($members->User_Status===1)
                                <h5><span class="badge badge-success">Enable</span></h5>
                                @else
                                <h5><span class="badge badge-danger">Disable</span></h5>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>วันที่สมัคร</td>
                            <td>{{ $members->created_at }}</td>
                        </tr>
                        <tr>
                            <td>วันที่แก้ไข</td>
                            <td>{{ $members->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-members.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
