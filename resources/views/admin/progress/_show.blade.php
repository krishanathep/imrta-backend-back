@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Project Progress</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Project Progress</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $progress->project_prograss_id }}</td>
                            </tr>
                            <tr>
                                <td>Proposal Sub</td>
                                <td>{{ $progress->psubmission->proposal_sub_status }}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>{{ $progress->project_prograss_type }}</td>
                            </tr>
                            <tr>
                                <td>Budget</td>
                                <td>{{ $progress->project_prograss_expense_budget }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($progress->project_prograss_status == 0)
                                        <p class="text-primary">Waiting</p>
                                    @elseif ($progress->project_prograss_status == 1)
                                        <p class="text-success">Approved</p>
                                    @elseif ($progress->project_prograss_status == 8)
                                        <p class="text-warning">Canceled</p>
                                    @else
                                        <p class="text-danger">No Approve</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Cratet at</td>
                                <td>{{ $progress->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>Update at</td>
                                <td>{{ $progress->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-progress.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
