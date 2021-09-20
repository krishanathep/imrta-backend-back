@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Create Branch</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Branch</div>
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

                        <form action="{{ route('admin-shoppinglist-branch.update', $branch->running_no) }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category</strong>
                                        <input type="text" name='shopping_category_id' class="form-control" placeholder='Enter Category...' value="{{ $branch->shopping_category_id }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Branch</strong>
                                        <input type="text" name='shopping_branch_id' class="form-control" placeholder='Enter Branch..' value="{{ $branch->shopping_branch_id }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Branch Name</strong>
                                        <input type="text" name='branch_name_en' class="form-control" placeholder='Enter Branch Name...' value="{{ $branch->branch_name_en }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Full Name</strong>
                                        <input type="text" name='branch_full_name' class="form-control" placeholder='Enter Full Name...' value="{{ $branch->branch_full_name }}">
                                    </div>
                                </div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Upload File</strong>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="customFile" name='branch_details_file_name'>
                                      <label class="custom-file-label" for="customFile">{{ $branch->branch_details_file_name }}</label>
                                    </div>
                                  </div>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Status</strong>
                                        <select class="form-control" id="sel1" name='branch_status'>
                                        <option value="1" {{ $branch->branch_status == 1 ? 'selected' : '' }}">Enable</option>
                                        <option value="0" {{ $branch->branch_status == 0 ? 'selected' : '' }}>Distble</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-shoppinglist-branch.index') }}"
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