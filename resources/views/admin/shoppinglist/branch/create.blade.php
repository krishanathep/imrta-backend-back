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

                        <form action="{{ route('admin-shoppinglist-branch.store') }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category</strong>
                                        <input type="text" name='shopping_category_id' class="form-control" placeholder='Enter Category...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Branch</strong>
                                        <input type="text" name='shopping_branch_id' class="form-control" placeholder='Enter Branch..'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Branch Name</strong>
                                        <input type="text" name='branch_name_en' class="form-control" placeholder='Enter Branch Name...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Full Name</strong>
                                        <input type="text" name='branch_full_name' class="form-control" placeholder='Enter Full Name...'>
                                    </div>
                                </div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Upload File</strong>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="customFile" name='branch_details_file_name'>
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                  </div>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name='branch_status' class="form-control" value="1" hidden>
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