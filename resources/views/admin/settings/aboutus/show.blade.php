@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">View About Us</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View About Us</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>ID</td>
                                <td>{{ $aboutus->id }}</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{ $aboutus->title }}</td>
                            </tr>
                            <tr>
                                <td>Body</td>
                                <td>{{ $aboutus->body }}</td>
                            </tr>
                            <tr>
                                <td>Cratet</td>
                                <td>{{ $aboutus->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>Update</td>
                                <td>{{ $aboutus->updated_at }}</td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <a href="{{ route('admin-setting-aboutus.index') }}" class='btn btn-secondary'><i
                                    class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
