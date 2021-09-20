@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Update Categorys</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Update Categorys list</div>
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

                        <form
                            action="{{ route('admin-shoppinglist-categorys.update', $categorys->shopping_category_id) }}"
                            method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Category Name Th : </strong>
                                        <input type="text" name='shopping_category_name_th' class="form-control"
                                            value="{{ $categorys->shopping_category_name_th }}"
                                            placeholder='Enter Category Name Th...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Categroy Name Eng : </strong>
                                        <input type="text" name='shopping_category_name_en' class="form-control"
                                            value="{{ $categorys->shopping_category_name_en }}"
                                            placeholder='Enter Categroy Name Eng...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Detail : </strong>
                                        <input type="text" name='shopping_category_details' class="form-control"
                                            value="{{ $categorys->shopping_category_details }}"
                                            placeholder='Enter Detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Status :</label>
                                        <select class="form-control" id="sel1" name="shopping_category_status">
                                          <option value="1" {{ $categorys->shopping_category_status == 1 ? 'selected' : '' }}>Enable</option>
                                          <option value="2" {{ $categorys->shopping_category_status == 2 ? 'selected' : '' }}>Disable</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-shoppinglist-categorys.index') }}"
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

