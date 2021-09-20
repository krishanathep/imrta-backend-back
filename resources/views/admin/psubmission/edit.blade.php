@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Create Proposal Submission</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Proposal Submission</div>
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

                        <form action="{{ route('admin-psubmission.update', $psubmission->proposal_sub_id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Approve:</label>
                                        <select class="form-control" id="sel1" name="proposal_dev_approve_id">
                                            @foreach ($pdevpaarove as $item)
                                                <option value="{{ $item->proposal_dev_approve_id }}"
                                                    {{ $item->proposal_dev_approve_id  == $psubmission->proposal_dev_approve_id ? 'selected' : '' }}>
                                                    {{ $item->proposal_dev_approve_details }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Type:</label>
                                        <select class="form-control" id="sel1" name="proposalsub_ResearchType_id">
                                            @foreach ($research as $item)
                                                <option value="{{ $item->Research_types_id }}"
                                                    {{ $item->Research_types_id  == $psubmission->proposalsub_ResearchType_id ? 'selected' : '' }}>
                                                    {{ $item->types_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Status :</label>
                                        <select class="form-control" id="sel1" name="proposal_sub_status">
                                          <option value="0" {{ $psubmission->proposal_sub_status == 0 ? 'selected' : '' }}>Waiting</option>
                                          <option value="1" {{ $psubmission->proposal_sub_status == 1 ? 'selected' : '' }}>Approved</option>
                                          <option value="8" {{ $psubmission->proposal_sub_status == 8 ? 'selected' : '' }}>Canceled</option>
                                          <option value="9" {{ $psubmission->proposal_sub_status == 9 ? 'selected' : '' }}>No Approve</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-psubmission.index') }}"
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
