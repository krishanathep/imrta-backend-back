@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View Additional</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View Additional</div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>{{ $additional->shopping_add_id }}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td>{{ $additional->members->username}}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $additional->categorys->shopping_category_name_th }}</td>
                        </tr>
                        <tr>
                            <td>Category Name Eng</td>
                            <td>{{ $additional->shopping_add_name }}</td>
                        </tr>
                        <tr>
                            <td>Category Detail</td>
                            <td>{{ $additional->shopping_add_details }}</td>
                        </tr>
                        <tr>
                            <td>Category Status</td>
                            <td>
                            @if ($additional->shopping_list_status == 0)
                                <p class="text-primary">Waiting</p>
                            @elseif ($additional->shopping_list_status == 1)
                                <p class="text-success">Approved</p>
                            @elseif ($additional->shopping_list_status == 8)
                                <p class="text-warning">Canceled</p>
                            @else
                                <p class="text-danger">No Approve</p>
                            @endif
                        </tr>
                        <tr>
                            <td>Cratet at</td>
                            <td>{{ $additional->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Update at</td>
                            <td>{{ $additional->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-shoppinglist-additional.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection