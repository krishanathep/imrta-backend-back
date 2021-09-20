@extends('layouts.app')

@push('page_css')

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <h1 class="text-black-50">About us</h1>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Create at</th>
                                            <th>Update at</th>
                                            <th width='10%'>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aboutus as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->body }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin-setting-aboutus.destroy', $item->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-info"
                                                            href="{{ route('admin-setting-aboutus.show', $item->id) }}">
                                                            <i class="far fa-eye"></i></a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin-setting-aboutus.edit', $item->id) }}"><i
                                                                class="far fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure to delete?')" hidden> <i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')

@endpush
