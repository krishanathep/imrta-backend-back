@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">เพิ่มประเภทสถานะ</h3>
            </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Create Type Status</div>
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

                    <form action="{{ route('admin-general-status.store') }}" method='POST'>
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type Main : </strong>
                                <select class="form-control" id="sel1" name="type_main_id">
                                    <option value="">Please Select...</option>
                                    @foreach ($main as $item)
                                    <option value="{{ $item->type_main_id }}">
                                        {{ $item->type_main_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type Sub : </strong>
                                <select class="form-control" id="sel1" name="type_sub_id">
                                    <option value="">Please Select...</option>
                                    @foreach ($sub as $item)
                                    <option value="{{ $item->type_sub_id }}">
                                        {{ $item->type_sub_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type Name : </strong>
                                <input type="text" name='type_status_text' class="form-control" placeholder='Enter Type Name...'>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type Action : </strong>
                                <input type="text" name='type_status_action' class="form-control" placeholder='Enter Type Action...'>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name='status' class="form-control" value="1" hidden />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class='float-right'>
                                <a href="{{ route('admin-general-status.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go
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
