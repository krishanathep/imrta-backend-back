@extends('layouts.app')

@push('page_css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-black-50">Progress Report</h1>
            </div>
            <div class="col-lg-12">
                <!-- DONUT CHART -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Progress Chart</h3>
                    </div>
                    <div class="card-body">
                        <p>All Project : {{ $all }}</p>
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>  
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <div class="col-lg-12">
                <!-- PROGRESS TABLE -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><P>Progress Table</P></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ขอขยายเวลา</td>
                                    <td>0</td>                         
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ดำเนินการเสร็จสิ้น</td>
                                    <td>0</td>                         
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ยกเลิกโครงการ</td>
                                    <td>0</td>                 
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>ล่าช้ากว่าแผน</td>
                                    <td>0</td>  
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>เป็นไปตามแผน</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    @endsection

@push('page_scripts')
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>   

<script>
    $(function () {
      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Approved',
            'In Progress',

        ],
        datasets: [
          {
            data: [{{$approve}}, {{$inprogress}}],
            backgroundColor : ['#00a65a','#3c8dbc'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
    })
  </script>
@endpush
