@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">เพิ่มแหล่งงบประมาณ</h3>
                </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Budget Source</div>
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

                        <form action="{{ route('admin-general-budget.store') }}" method='POST'>
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>อักษรย่อ</strong>
                                    <input type="text" name='budget_prefix' class="form-control"
                                        placeholder='Enter Prefix...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อแหล่งงบประมาณ ภาษาไทย</strong>
                                    <input type="text" name='budget_name_TH' class="form-control"
                                        placeholder='Enter Name Th...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อแหล่งงบประมาณ ภาษาอังกฤษ</strong>
                                    <input type="text" name='budget_name_EN' class="form-control"
                                        placeholder='Enter Name En...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ประเภท</strong>
                                    <input type="text" name='budget_type' class="form-control"
                                        placeholder='Enter Type...'>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-general-budget.index') }}" class='btn btn-secondary'><i
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
