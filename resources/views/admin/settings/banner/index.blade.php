@extends('layouts.app') 

@push('page_css') 

@endpush 

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ป้ายแบนเนอร์</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success mt-3" href="{{ route('admin-setting-banner.create') }}"> <i class="fas fa-plus"></i> Create </a>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Banners</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th>ลำดับ</th>
                                        <th>รูปแบนเนอร์</th>
                                        <th>ชื่อรูปแบนเนอร์</th>
                                        <th>สถานะ</th>
                                        <th>ชื่อผู้ใช้งาน</th>
                                        <th>วันที่เริ่มใช้งาน</th>
                                        <th>วันสิ้นสุดใช้งาน</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset($item->banner_url) }}" width="100px"></td>
                                        <!--
                                        <td><a href="{{ asset('/image/'.$item->banner_url) }}">{{ asset('/image/'.$item->banner_url) }}</a></td>
                                        -->
                                        <td>{{ $item->banner_target_url }}</td>
                                        <td>
                                        @if ($item->banner_status == 1)
                                        <h5><span class="badge badge-success">Enable</span></h5>
                                        @else
                                        <h5><span class="badge badge-danger">Disible</span></h5>
                                        @endif
                                        </td>
                                        <td>{{ $item->user_admin_id }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->stop_date }}</td>
                                        <td>
                                            <form action="{{ route('admin-setting-banner.destroy', $item->banner_id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('admin-setting-banner.show', $item->banner_id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('admin-setting-banner.edit', $item->banner_id) }}"><i class="far fa-edit"></i></a>
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                {!! $banner->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection 

@push('page_scripts') 

@endpush