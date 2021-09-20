@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black-50">Project Approved</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Project Approved</div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Code</td>
                            <td>{{ $projectapprove->project_code }}</td>
                        </tr>
                        <tr>
                            <td>Project name</td>
                            <td>{{ $projectapprove->project_name_th }}</td>
                        </tr>
                        <tr>
                            <td>Research</td>
                            <td>{{ $projectapprove->research_project }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ $projectapprove->research_type }}</td>
                        </tr>
                        <tr>
                            <td>Head</td>
                            <td>{{ $projectapprove->header_position }}</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td>{{ $projectapprove->project_budget }}</td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td>{{ $projectapprove->project_year }}</td>
                        </tr>
                            <td>Create date</td>
                            <td>{{ $projectapprove->project_date_sent }}</td>
                        </tr>
                    </table>
                    <div class="float-right mt-2">
                        <a href="{{ route('admin-old-projectapprove.index') }}" class='btn btn-secondary'><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection