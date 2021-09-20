@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Prefix</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Prefix</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $branch->running_no }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $branch->shopping_category_id }}</td>
                            </tr>
                            <tr>
                                <td>Branch</td>
                                <td>{{ $branch->shopping_branch_id }}</td>
                            </tr>
                            <tr>
                                <td>Branch Name</td>
                                <td>{{ $branch->branch_name_en }}</td>
                            </tr>
                            <tr>
                                <td>Full Name</td>
                                <td>{{ $branch->branch_full_name }}</td>
                            </tr>
                            <tr>
                                <td>File Name</td>
                                <td>{{ $branch->branch_details_file_name }}</td>
                            </tr> 
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($branch->branch_status == 1)
                                        <p class="text-success">Enable</p>
                                    @else
                                        <p class="text-danger">Disable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Cratet at</td>
                                <td>{{ $branch->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Update at</td>
                                <td>{{ $branch->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-shoppinglist-branch.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
