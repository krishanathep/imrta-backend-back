@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"><br/>
            <h1>Show Product</h1>
        </div>
        <div class="pull-right"><br/>
            <a href="{{ route('products.index') }}" class="btn btn-info"> <i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name : </strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name : </strong>
            {{ $product->detail }}
        </div>
    </div>
</div>
@endsection