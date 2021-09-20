@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Edit Concept Development</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Concept Development</div>
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

                        <form action="{{ route('admin-concepdevelopment.update', $concepdevelopment->concept_dev_id) }}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Categorys :</label>
                                        <select class="form-control" id="sel1" name="shopping_list_id">
                                            @foreach ($shoppinglist as $item)
                                                <option value="{{ $item->shopping_list_id }}"
                                                    {{ $item->shopping_list_id == $concepdevelopment->shopping_list_id ? 'selected' : '' }}>
                                                    {{ $item->shopping_list_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name : </strong>
                                        <input type="text" name='concept_dev_name' class="form-control" value="{{ $concepdevelopment->concept_dev_name }}"
                                            placeholder='Enter name...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Detail : </strong>
                                        <input type="text" name='concept_dev_details' class="form-control" value="{{ $concepdevelopment->concept_dev_details }}"
                                            placeholder='Enter detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Type :</label>
                                        <select class="form-control" id="sel1" name="research_type_id">
                                            @foreach ($research as $item)
                                                <option value="{{ $item->research_types_id  }}"
                                                    {{ $item->research_types_id  == $concepdevelopment->research_type_id ? 'selected' : '' }}>
                                                    {{ $item->research_types_id  }}  {{ $item->types_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Category Add Status :</label>
                                        <select class="form-control" id="sel1" name="concept_dev_status">
                                          <option value="0" {{ $concepdevelopment->concept_dev_status == 0 ? 'selected' : '' }}>Waitinng</option>
                                          <option value="1" {{ $concepdevelopment->concept_dev_status == 1 ? 'selected' : '' }}>Approved</option>
                                          <option value="8" {{ $concepdevelopment->concept_dev_status == 8 ? 'selected' : '' }}>Canceled</option>
                                          <option value="9" {{ $concepdevelopment->concept_dev_status == 9 ? 'selected' : '' }}>No Approve</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-concepdevelopment.index') }}"
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