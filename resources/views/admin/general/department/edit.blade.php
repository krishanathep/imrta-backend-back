@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">แก้ไขหน่วยงาน</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Update Department</div>
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

                        <form
                            action="{{ route('admin-general-department.update', $department->department_id) }}"
                            method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>ชื่อหน่วยงาน</strong>
                                        <input type="text" name='department_name' class="form-control"
                                            value="{{ $department->department_name }}"
                                            placeholder='Enter Category Name Th...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">สถานะ</label>
                                        <select class="form-control" id="sel1" name="department_status">
                                          <option value="1" {{ $department->department_status == 1 ? 'selected' : '' }}>Enable</option>
                                          <option value="0" {{ $department->department_status == 0 ? 'selected' : '' }}>Disable</option>
                                        </select>
                                       
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-general-department.index') }}"
                                            class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go
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

