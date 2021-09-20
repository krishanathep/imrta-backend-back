@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลคำนำหน้าชื่อ</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Prefix</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ลำดับ</td>
                                <td>{{ $prefix->prefix_id }}</td>
                            </tr>
                            <tr>
                                <td>คำนำหน้าชื่อภาษาไทย</td>
                                <td>{{ $prefix->prefix_name_th }}</td>
                            </tr>
                            <tr>
                                <td>คำนำหน้าชื่อภาษาอังกฤษ</td>
                                <td>{{ $prefix->prefix_name_en }}</td>
                            </tr>
                            <tr>
                                <td>สถานะ</td>
                                <td>
                                    @if ($prefix->prefix_status == 1)
                                    <h5><span class="badge badge-success">Enable</span></h5>
                                    @else
                                    <h5><span class="badge badge-danger">Disable</span></h5>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>วันที่สร้าง</td>
                                <td>{{ $prefix->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>วันที่แก้ไข</td>
                                <td>{{ $prefix->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-general-prefix.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
