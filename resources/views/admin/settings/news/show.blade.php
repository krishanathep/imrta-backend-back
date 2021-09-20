@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ข้อมูลข่าวสาร</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View News</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ลำดับ</td>
                                <td>{{ $news->id }}</td>
                            </tr>
                            <tr>
                                <td>หัวข้อข่าวสาร</td>
                                <td>{{ $news->title }}</td>
                            </tr>
                            <tr>
                                <td>ที่มาของข่าวสาร</td>
                                <td>{{ Str::limit($news->detail, 100) }}</td>
                            </tr>
                            <tr>
                                <td>สถานะ</td>
                                <td>
                                    @if ($news->status === 1)
                                        <p>Enable</p>    
                                    @else
                                        <p>Disable</p>  
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>ชื่อผู้ใช้งาน</td>
                                <td>{{ $news->user_admin_id }}</td>
                            </tr>
                            </tr>
                                <td>วันที่สร้าง</td>
                                <td>{{ $news->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>วันที่แก้ไข</td>
                                <td>{{ $news->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-setting-news.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
