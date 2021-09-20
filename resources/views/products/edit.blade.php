@extends('products.layout')

@section('content')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left"><br/>
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right"><br/>
            <a href="{{ route('products.index')}}" class="btn btn-info"> <i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

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

<form action="{{route ('products.update', $product->concept_dev_id) }}" method='POST'>
    @csrf 
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name : </strong>
                <input type="text" name='name' value='{{ $product->name }}' class="form-control" placeholder='Enter product name...'>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail : </strong>
                <input type="text" name='detail' value='{{ $product->detail }}' class="form-control" placeholder='Enter product detail...'>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type='submit' class='btn btn-primary'> <i class="far fa-check-circle"></i> Submit</button>
        </div>
    </div>
</form>
@endsection