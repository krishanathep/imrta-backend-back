@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Proposal Submission</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Proposal Submission</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $psubmission->proposal_sub_id }}</td>
                            </tr>
                            <tr>
                                <td>Approve</td>
                                <td>{{ $psubmission->pdevpaarove->proposal_dev_id }}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>{{ $psubmission->research->types_name_th }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($psubmission->proposal_sub_status == 0)
                                        <p class="text-primary">Waiting</p>
                                    @elseif ($psubmission->proposal_sub_status == 1)
                                        <p class="text-success">Approved</p>
                                    @elseif ($psubmission->proposal_sub_status == 8)
                                        <p class="text-warning">Canceled</p>
                                    @else
                                        <p class="text-danger">No Approve</p>
                                    @endif
                                </td>
                            </tr>
                            <td>Create at</td>
                            <td>{{ $psubmission->created_at }}</td>
                            </tr>
                            </tr>
                            <td>Update at</td>
                            <td>{{ $psubmission->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-psubmission.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
