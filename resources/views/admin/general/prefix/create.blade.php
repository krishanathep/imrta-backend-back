@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">เพิ่มคำนำหน้าชื่อ</h3>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Prefix</div>
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

                        <form action="{{ route('admin-general-prefix.store') }}" method='POST'>
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>คำนำหน้า ภาษไทย</strong>
                                    <input type="text" name='prefix_name_th' class="form-control"
                                        placeholder='Enter Prefix Name Th...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>คำนำหน้า ภาษาอังกฤษ</strong>
                                    <input type="text" name='prefix_name_en' class="form-control"
                                        placeholder='Enter Prefix Name En...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name='prefix_status' class="form-control" value="1" hidden
                                        placeholder='Enter Prefix Status...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-general-prefix.index') }}" class='btn btn-secondary'><i
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
