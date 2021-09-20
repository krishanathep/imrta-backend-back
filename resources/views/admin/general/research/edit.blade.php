@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">แก้ไขประเภทโครงการวิจัย</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Update Research Type</div>
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

                        <form action="{{ route('admin-general-research.update', $research->research_types_id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">ประเภทงานวิจัย</label>
                                    <select class="form-control" id="sel1" name="research_type_main_id">
                                        <option value="">Please Select...</option>
                                        @foreach ($typemain as $item)
                                            <option value="{{ $item->type_main_id }}" {{ $item->type_main_id == $research->research_type_main_id ? 'selected' : '' }}>
                                                {{ $item->type_main_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อประเภทงานวิจัย ภาษาไทย</strong>
                                    <input type="text" name='types_name_th' class="form-control" value="{{ $research->types_name_th }}"
                                        placeholder='Enter Name Th...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อประเภทงานวิจัย ภาษาอังกฤษ</strong>
                                    <input type="text" name='types_name_en' class="form-control" value="{{ $research->types_name_en }}"
                                        placeholder='Enter Name En...'>
                                </div>
                            </div>
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">สถานะ</label>
                                    <select class="form-control" id="sel1" name="types_status">
                                      <option value="1" {{ $research->types_status == 1 ? 'selected' : '' }}>Enable</option>
                                      <option value="0" {{ $research->types_status == 0 ? 'selected' : '' }}>Disable</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-general-research.index') }}" class='btn btn-secondary'><i
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
