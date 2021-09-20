@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Create Shopping list</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Shopping list</div>
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

                        <form action="{{ route('admin-shoppinglist.store') }}" method='POST'>
                            @csrf
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">Category :</label>
                                    <select class="form-control" id="sel1" name="category_id">
                                        <option value="">Please Select...</option>
                                        @foreach ($categorys as $item)
                                            <option value="{{ $item->shopping_category_id }}">
                                                {{ $item->shopping_category_name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">Category Branch :</label>
                                    <select class="form-control" id="sel1" name="category_branch_id">
                                        <option value="">Please Select...</option>
                                        @foreach ($branch as $item)
                                            <option value="{{ $item->running_no }}">{{ $item->branch_name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 cal-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="sel1">User Name :</label>
                                    <select class="form-control" id="sel1" name="user_id">
                                        <option value="">Please Select...</option>
                                        @foreach ($members as $item)
                                            <option value="{{ $item->user_id }}">{{ $item->User_FName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class='float-right'>
                                    <a href="{{ route('admin-shoppinglist.index') }}" class='btn btn-secondary'><i
                                            class="far fa-arrow-alt-circle-left"></i> Go
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
