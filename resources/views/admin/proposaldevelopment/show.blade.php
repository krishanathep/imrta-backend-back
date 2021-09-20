@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Proposal Development</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Proposal Development</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $proposaldevelopment->proposal_dev_id }}</td>
                            </tr>
                            <tr>
                                <td>Approved</td>
                                <td>{{ $proposaldevelopment->concept_dev_approve_id }}</td>
                            </tr>
                            <tr>
                                <td>Shoppinglist</td>
                                <td>{{ $proposaldevelopment->shoppinglist->shopping_list_id  }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $proposaldevelopment->proposal_dev_name }}</td>
                            </tr>
                            <tr>
                                <td>Detail</td>
                                <td>{{ $proposaldevelopment->proposal_dev_details }}</td>
                            </tr>
                            <tr>
                                <td>Re type</td>
                                <td>{{ $proposaldevelopment->research->types_name_th }}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                @if ($proposaldevelopment->proposal_dev_type == 1)
                                <p class="text-primary">ขอสนับสนุนงบประมาณ</p>
                                @else
                                <p class="text-success">พัฒนาโครงการวิจัย</p>   
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($proposaldevelopment->proposal_dev_status == 0)
                                    <p class="text-primary">Waiting</p>
                                @elseif ($proposaldevelopment->proposal_dev_status == 1)
                                    <p class="text-success">Approved</p>
                                @elseif ($proposaldevelopment->proposal_dev_status == 8)
                                    <p class="text-warning">Canceled</p>
                                @else
                                    <p class="text-danger">No Approve</p>
                                @endif
                                </td>
                            </tr>
                            <td>Create at</td>
                                <td>{{ $proposaldevelopment->created_at }}</td>
                            </tr>
                            </tr>
                            <td>Update at</td>
                                <td>{{ $proposaldevelopment->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-proposaldevelopment.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
