@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Create Proposal Development</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Create Proposal Development</div>
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
                            action="{{ route('admin-proposaldevelopment.update', $proposaldevelopment->proposal_dev_id) }}"
                            method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Approved :</label>
                                        <select class="form-control" id="sel1" name="concept_approve_id">
                                            @foreach ($concepapprove as $item)
                                                <option value="{{ $item->concept_dev_id }}"
                                                    {{ $item->concept_dev_id == $proposaldevelopment->concept_approve_id ? 'selected' : '' }}>
                                                    {{ $item->concept_dev_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Shopping list:</label>
                                        <select class="form-control" id="sel1" name="shopping_id">
                                            @foreach ($shoppinglist as $item)
                                                <option value="{{ $item->shopping_list_id }}"
                                                    {{ $item->shopping_list_id == $proposaldevelopment->shopping_id ? 'selected' : '' }}>
                                                    {{ $item->shopping_list_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name : </strong>
                                        <input type="text" name='proposal_dev_name' class="form-control"
                                            value="{{ $proposaldevelopment->proposal_dev_name }}"
                                            placeholder='Enter name...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Detail : </strong>
                                        <input type="text" name='proposal_dev_details' class="form-control"
                                            value="{{ $proposaldevelopment->proposal_dev_details }}"
                                            placeholder='Enter detail...'>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Re Type:</label>
                                        <select class="form-control" id="sel1" name="research_type_id">
                                            @foreach ($research as $item)
                                                <option value="{{ $item->Research_types_id }}"
                                                    {{ $item->Research_types_id == $proposaldevelopment->research_type_id ? 'selected' : '' }}>
                                                    {{ $item->types_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Type :</label>
                                        <select class="form-control" id="sel1" name="proposal_dev_type">
                                            <option value="0"
                                                {{ $proposaldevelopment->proposal_dev_type == 1 ? 'selected' : '' }}>
                                                ขอสนับสนุนงบประมาณ</option>
                                            <option value="1"
                                                {{ $proposaldevelopment->proposal_dev_type == 0 ? 'selected' : '' }}>
                                                พัฒนาโครงการวิจัย</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 cal-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Status :</label>
                                        <select class="form-control" id="sel1" name="proposal_dev_status">
                                            <option value="0"
                                                {{ $proposaldevelopment->proposal_dev_status == 0 ? 'selected' : '' }}>
                                                Waiting</option>
                                            <option value="1"
                                                {{ $proposaldevelopment->proposal_dev_status == 1 ? 'selected' : '' }}>
                                                Approved</option>
                                            <option value="8"
                                                {{ $proposaldevelopment->proposal_dev_status == 8 ? 'selected' : '' }}>
                                                Canceled</option>
                                            <option value="9"
                                                {{ $proposaldevelopment->proposal_dev_status == 9 ? 'selected' : '' }}>No
                                                Approve</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class='float-right'>
                                        <a href="{{ route('admin-proposaldevelopment.index') }}"
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
