@extends('layouts.app')

@push('page_css') 
<!-- include libraries(jQuery, bootstrap) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">แก้ไขข่าวสาร</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Banner</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin-setting-news.update', $news->id) }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>หัวข้อข่าวสาร</strong>
                                    <input type="text" name='title' class="form-control" value="{{ $news->title }}"
                                        placeholder='Enter Title...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ที่มาของข่าวสาร</strong>
                                    <textarea class="form-control" name="detail" >{{ $news->detail }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">สถานะ</label>
                                    <select class="form-control" id="sel1" name="status">
                                      <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>Enable</option>
                                      <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>Disable</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อผู้ใช้งาน</strong>
                                    <input type="text" name='user_admin_id' class="form-control" value="{{ $news->user_admin_id }}"
                                        placeholder='Enter Title...' readonly>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-setting-news.index') }}" class='btn btn-secondary'><i
                                            class="far fa-arrow-alt-circle-left"></i> Go
                                        Back</a>
                                    <button type="submit" class="btn btn-primary"> <i class="far fa-check-circle"></i>
                                        Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
@endpush