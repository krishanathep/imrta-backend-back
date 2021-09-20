@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Concep Development</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Concep Development</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>CD id</td>
                                <td>{{ $concepdevelopment->concept_dev_id }}</td>
                            </tr>
                            <tr>
                                <td>SL id</td>
                                <td>{{ $concepdevelopment->shopping_list_id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $concepdevelopment->concept_dev_name }}</td>
                            </tr>
                            <tr>
                                <td>Detail</td>
                                <td>{{ $concepdevelopment->concept_dev_details }}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>{{ $concepdevelopment->research->types_name_th }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($concepdevelopment->concept_dev_status == 0)
                                        <p class="text-primary">Waiting</p>
                                    @elseif ($concepdevelopment->concept_dev_status == 1)
                                        <p class="text-success">Approved</p>
                                    @elseif ($concepdevelopment->concept_dev_status == 8)
                                        <p class="text-warning">Canceled</p>
                                    @else
                                        <p class="text-danger">No Approve</p>
                                    @endif
                                </td>
                            </tr>
                            <td>Create at</td>
                            <td>{{ $concepdevelopment->created_at }}</td>
                            </tr>
                            </tr>
                            <td>Update at</td>
                            <td>{{ $concepdevelopment->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-concepdevelopment.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
