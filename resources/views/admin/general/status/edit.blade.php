@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">แก้ไขประเภทสถานะ</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Update Type Status</div>
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

                        <form action="{{ route('admin-general-status.update', $status->type_status_id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>โครงการหลัก : </strong>
                                    <select class="form-control" id="sel1" name="" disabled>
                                        <option value="">Please Select...</option>
                                        @foreach ($main as $item)
                                        <option value="{{ $item->type_main_id }}" {{ $item->type_main_id == $status->type_main_id ? 'selected' : '' }}>
                                            {{ $item->type_main_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="type_main_id" hidden>
                                        <option value="">Please Select...</option>
                                        @foreach ($main as $item)
                                        <option value="{{ $item->type_main_id }}" {{ $item->type_main_id == $status->type_main_id ? 'selected' : '' }}>
                                            {{ $item->type_main_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>โครงการรอง : </strong>
                                    <select class="form-control" id="sel1" name="" disabled>
                                        <option value="">Please Select...</option>
                                        @foreach ($sub as $item)
                                        <option value="{{ $item->type_sub_id }}" {{ $item->type_sub_id == $status->type_sub_id ? 'selected' : '' }}>
                                            {{ $item->type_sub_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="type_sub_id" hidden>
                                        <option value="">Please Select...</option>
                                        @foreach ($sub as $item)
                                        <option value="{{ $item->type_sub_id }}" {{ $item->type_sub_id == $status->type_sub_id ? 'selected' : '' }}>
                                            {{ $item->type_sub_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อสถานะ : </strong>
                                    <input type="text" name='type_status_text' class="form-control" value="{{ $status->type_status_text }}"
                                        placeholder='Enter Name Th...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name='type_status_action' class="form-control" value="{{ $status->type_status_action }}"
                                        placeholder='Enter Name En...' hidden>
                                </div>
                            </div>
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">สถานะ :</label>
                                    <select class="form-control" id="sel1" name="status">
                                      <option value="1" {{ $status->status == 1 ? 'selected' : '' }}>Enable</option>
                                      <option value="0" {{ $status->status == 0 ? 'selected' : '' }}>Disable</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-general-status.index') }}" class='btn btn-secondary'><i
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
