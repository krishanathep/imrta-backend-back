@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Project Budget</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Project Budget</div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Code</td>
                            <td>{{ $projectbudget->project_code }}</td>
                        </tr>
                        <tr>
                            <td>Project name</td>
                            <td>{{ $projectbudget->project_name_th }}</td>
                        </tr>
                        <tr>
                            <td>Research</td>
                            <td>{{ $projectbudget->research_project }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ $projectbudget->research_type }}</td>
                        </tr>
                        <tr>
                            <td>Head</td>
                            <td>{{ $projectbudget->header_position }}</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td>{{ $projectbudget->project_budget }}</td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td>{{ $projectbudget->project_year }}</td>
                        </tr>
                            <td>Create date</td>
                            <td>{{ $projectbudget->project_date_sent }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-old-projectbudget.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection