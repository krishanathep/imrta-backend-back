@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลป้ายแบนเนอร์</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Banner</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ลำดับ</td>
                                <td>{{ $banner->banner_id }}</td>
                            </tr>
                            <tr>
                                <td>รูปแบนเนอร์</td>
                                <td><img src="{{ asset($banner->banner_url) }}" width="100px"</td>
                            </tr>
                            <tr>
                                <td>ชื่อรูปแบนเนอร์</td>
                                <td>{{ $banner->banner_target_url }}</td>
                            </tr>
                            <tr>
                                <td>สถานะ</td>
                                <td>
                                    @if ($banner->banner_status == 1)
                                        <p class="text-success">Enable</p>
                                    @else
                                        <p class="text-danger">Disable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>ชื่อผู้ใช้งาน</td>
                                <td>{{ $banner->user_admin_id }}</td>
                            </tr>
                            <tr>
                                <td>วันที่เริ่มใช้งาน</td>
                                <td>{{ $banner->start_date }}</td>
                            </tr>
                            <tr>
                                <td>วันสิ้นสุดใช้งาน</td>
                                <td>{{ $banner->stop_date }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-setting-banner.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
