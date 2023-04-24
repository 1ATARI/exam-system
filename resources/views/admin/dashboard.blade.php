@extends('includes.admin.dashboard')

@section('title' ,'Dashboard')

@section('content')
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('admin.users.index')}}">

                <span class="count_top"><i class="fa fa-user"></i> Total users</span>
                <div class="count green">{{$users_count}}</div>
                </a>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('admin.courses.index')}}">

                <span class="count_top"><i class="fa fa-table"></i> Total Courses</span>
                <div class="count green">{{$courses_count}}</div>
                </a>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('admin.exams.index')}}">

                <span class="count_top"><i class="fa fa-edit"></i> Total Exams</span>
                <div class="count green">{{$exams_count}}</div>
                </a>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-question"></i> Total Questions</span>
                <div class="count">{{$questions_count}}</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>Examined students</span>
                <div class="count">{{$examined_students}}</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Examined Exams</span>
                <div class="count">{{$examined_exams}}</div>
            </div>

        </div>
    </div>
    <!-- /top tiles -->



    <div class="row mt-2">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph x_panel">
                <div class="x_title">
                    <div class="col-md-6">
                        <h3 class="mt-2">Total Examined Exams For Each Month</h3>
                    </div>
                    <div class="col-md-6">
                        <div  class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class=" fa fa-calendar"></i>
                            <span>January 1, {{date("Y")}} - December 30, {{date("Y")}}</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <div class="demo-container" >
                        <canvas id="myChart"  height="100" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Recent Exams Today </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            @forelse($today_exams as $exam)

                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a href="{{route('admin.exams.questions.index' ,$exam->exam )}}">{{$exam->exam->name}} Exam</a>
                                        </h2>
                                        <div class="byline">
                                            <span>{{$exam->created_at->format('H:i')}}</span>  <a href="{{route('admin.users.show',$exam->user)}}">by <p class="font-weight-bold d-inline"> {{$exam->user->name}}</p></a>
                                        </div>
                                        <p class="excerpt"><b>Result:</b> Score {{$exam->score}} and percentage {{$exam->percentage}}%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @empty

                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>There are no exams Today</a>
                                            </h2>

                                        </div>
                                    </div>
                                </li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
        </div>




@endsection


@section('js')

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Number of Exams',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 99, 71, 0.2)',
                        'rgba(0, 128, 0, 0.2)',
                        'rgba(218, 112, 214, 0.2)',
                        'rgba(0, 128, 128, 0.2)',
                        'rgba(240, 230, 140, 0.2)'

                    ],
                    fill: true,
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 71)',
                        'rgb(0, 128, 0)',
                        'rgb(218, 112, 214)',
                        'rgb(0, 128, 128)',
                        'rgb(240, 230, 140)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }]
                }
            }
        });
    </script>

@endsection
