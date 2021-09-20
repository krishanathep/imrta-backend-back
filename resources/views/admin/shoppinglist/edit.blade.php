@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Edit Shoppinglist</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Shoppinglist</div>
                    <div class="card-body container">
                        <form action="">
                            <div class="form-group">
                                <label for="">Project Code</label>
                                <input type="text" class='form-control'placeholder='Enter your project code'>
                            </div>
                            <div class="form-group">
                                <label for="">Project Name</label>
                                <input type="text" class='form-control'placeholder='Enter your project name'>
                            </div>
                            <div class="form-group">
                                <label for="">Research</label>
                                <input type="text" class='form-control'placeholder='Enter your research'>
                            </div>
                            <div class="form-group">
                                <label for="">Project Type</label>
                                <input type="text" class='form-control'placeholder='Enter your project type'>
                            </div>
                            <div class="form-group">
                                <label for="">Head name</label>
                                <input type="text" class='form-control'placeholder='Enter your phone head name'>
                            </div>
                            <div class="form-group">
                                <label for="">Budget</label>
                                <input type="text" class='form-control'placeholder='Enter your budget'>
                            </div>
                            <div class="form-group">
                                <label for="">Period</label>
                                <input type="text" class='form-control'placeholder='Enter your period'>
                            </div>
                            <div class="form-group">
                                <label for="">Cratet date</label>
                                <input type="text" class='form-control'placeholder='Enter your create date'>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('admin-shoppinglist.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                                <button type='submit' class='btn btn-primary'> <i class="far fa-check-circle"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection