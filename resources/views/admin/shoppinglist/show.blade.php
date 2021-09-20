@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Shoppinglist</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Shoppinglist</div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>{{ $shoppinglist->shopping_list_id }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $shoppinglist->category_id }}</td>
                        </tr>
                        <tr>
                            <td>Branch</td>
                            <td>{{ $shoppinglist->category_branch_id }}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td>{{ $shoppinglist->user_id }}</td>
                        </tr>
                        <tr>
                            <td>Create at</td>
                            <td>{{ $shoppinglist->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Update at</td>
                            <td>{{ $shoppinglist->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-shoppinglist.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection