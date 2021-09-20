@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Create Categorys Additional</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Categorys Additional</div>
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

                        <form action="{{ route('admin-shoppinglist-additional.store') }}" method='POST'>
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">User :</label>
                                        <select class="form-control" id="sel1" name="user_id">
                                            <option value="">Please Select...</option>
                                            @foreach ($members as $item)
                                                <option value="{{ $item->user_id }}">
                                                    {{ $item->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Category :</label>
                                        <select class="form-control" id="sel1" name="user_id">
                                            <option value="">Please Select...</option>
                                            @foreach ($categorys as $item)
                                                <option value="{{ $item->shopping_category_id }}">
                                                    {{ $item->shopping_category_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category Add Name : </strong>
                                        <input type="text" name='shopping_add_name' class="form-control"
                                            placeholder='Enter Category add name...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category Add Detail : </strong>
                                        <input type="text" name='shopping_add_details' class="form-control"
                                            placeholder='Enter category add detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Category Add Status :</label>
                                        <select class="form-control" id="sel1" name="shopping_list_status">
                                          <option value="0">Waitinng</option>
                                          <option value="1">Approved</option>
                                          <option value="8">Canceled</option>
                                          <option value="9">No Approve</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-shoppinglist-additional.index') }}"
                                            class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go
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