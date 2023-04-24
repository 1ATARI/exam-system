@extends('includes.admin.dashboard')

@section('title')
    Dashboard
@endsection


@section('styles')

@endsection

@section('content')

<div>

    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <a href="{{route('student.exams.index')}}">
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-edit"></i> My Exams</span>
                <div class="count">{{$exam_count}}</div>
            </div>
            </a>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i>  Average Score Percentage</span>
                <div class="count {{$avg_resultMonth>=50 ?'green' :'red'}} ">{{$avg_resultMonth}}%</div>
            </div>
                <div class="col-md-4 col-sm-4  tile_stats_count">
                    <a href="{{route('courses.index')}}">
                    <span class="count_top"><i class="fa fa-table"></i> Total Courses </span>
                <div class="count ">{{$course_count}}</div>
                    </a>

                </div>


        </div>
    </div>
    <!-- /top tiles -->
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Average Score for your exams this year </h3>
                </div>
                <div class="col-md-6">
                    <div id="" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class=" fa fa-calendar"></i>
                        <span>January 1, {{date("Y")}} - December 30, {{date("Y")}}</span> <b class="caret"></b>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-9 ">
                <canvas  style="width:100%; height:280px;" id="theChart"></canvas>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

</div>





@endsection


@section('js')
    <script>
        var ctx = document.getElementById('theChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Average Percentage',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',

                    ],
                    fill: true,
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 100,
                            stepSize: 10,
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }]
                }
            }
        });
    </script>


@endsection
