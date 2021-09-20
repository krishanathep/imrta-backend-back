@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Edit Categorys Additional</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Categorys Additional</div>
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

                        <form action="{{ route('admin-shoppinglist-additional.update', $additional->shopping_add_id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">User:</label>
                                        <select class="form-control" id="sel1" name="user_id">
                                            @foreach ($members as $item)
                                                <option value="{{ $item->user_id }}"
                                                    {{ $item->user_id == $additional->shopping_add_id ? 'selected' : '' }}>
                                                    {{ $item->User_FName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Categorys :</label>
                                        <select class="form-control" id="sel1" name="shopping_category_id">
                                            @foreach ($categorys as $item)
                                                <option value="{{ $item->shopping_category_id }}"
                                                    {{ $item->shopping_category_id == $additional->shopping_add_id ? 'selected' : '' }}>
                                                    {{ $item->shopping_category_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category Add Name : </strong>
                                        <input type="text" name='shopping_add_name' class="form-control" value="{{ $additional->shopping_add_name }}"
                                            placeholder='Enter Category add name...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category Add Detail : </strong>
                                        <input type="text" name='shopping_add_details' class="form-control" value="{{ $additional->shopping_add_details }}"
                                            placeholder='Enter category add detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Category Add Status :</label>
                                        <select class="form-control" id="sel1" name="shopping_list_status">
                                          <option value="0" {{ $additional->shopping_category_status == 0 ? 'selected' : '' }}>Waitinng</option>
                                          <option value="1" {{ $additional->shopping_category_status == 1 ? 'selected' : '' }}>Approved</option>
                                          <option value="8" {{ $additional->shopping_category_status == 8 ? 'selected' : '' }}>Canceled</option>
                                          <option value="9" {{ $additional->shopping_category_status == 9 ? 'selected' : '' }}>No Approve</option>
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