@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Update Categorys</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Update Categorys list</div>
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
                            action="{{ route('admin-progress.update', $progress->project_prograss_id) }}"
                            method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Proposal Sub : </strong>
                                        <input type="text" name='proposal_sub_id' class="form-control"
                                            value="{{ $progress->proposal_sub_id }}"
                                            placeholder='Enter Category Name Th...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Type : </strong>
                                        <input type="text" name='project_prograss_type' class="form-control"
                                            value="{{ $progress->project_prograss_type }}"
                                            placeholder='Enter Categroy Name Eng...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Budget : </strong>
                                        <input type="text" name='project_prograss_expense_budget' class="form-control"
                                            value="{{ $progress->project_prograss_expense_budget }}"
                                            placeholder='Enter Detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Status :</label>
                                        <select class="form-control" id="sel1" name="project_prograss_status">
                                          <option value="0" {{ $progress->project_prograss_status == 0 ? 'selected' : '' }}>Waiting</option>
                                          <option value="1" {{ $progress->project_prograss_status == 1 ? 'selected' : '' }}>Approved</option>
                                          <option value="8" {{ $progress->project_prograss_status == 8 ? 'selected' : '' }}>Canceled</option>
                                          <option value="9" {{ $progress->project_prograss_status == 9 ? 'selected' : '' }}>No Approve</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-progress.index') }}"
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

