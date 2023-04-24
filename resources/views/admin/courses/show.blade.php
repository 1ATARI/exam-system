@extends('includes.admin.dashboard')

@section('title' , $course->name)

@section('styles')

@endsection

@section('content')

    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$course->name}} Detail</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Course Exams </h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-9 col-sm-9  ">

                            <ul class="stats-overview">
                                <li>
                                    <span class="name"> Created at </span>
                                    <span class="value text-success"> {{$course->created_at->format('d M Y')}} </span>
                                </li>
                                <li>
                                    <span class="name"> Total Exams </span>
                                    <span class="value text-success"> {{$course->exams->count()}} </span>
                                </li>
                                <li class="hidden-phone">
                                    <span class="name"> Course Doctor </span>
                                    <span class="value text-success"> {{$course->user->name}} </span>
                                </li>
                            </ul>
                            <br/>


                            <canvas style="height:350px;" id="myChart"></canvas>
                            <div class="mt-2">
                                <h4>Recent Activity</h4>

                                <!-- end of user messages -->
                                <ul class="messages">
                                    @forelse($course->exams()->latest()->get() as $exam)
                                        <li>
                                            <div class="message_date">
                                                <h3 class="date text-info">{{$exam->created_at->format("d")}}</h3>
                                                <p class="month">{{$exam->created_at->format("M")}}</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">{{$exam->name}}</h4>
                                                <br/>
                                                <p class="url">
                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    <a href="{{route('admin.exams.questions.index' , $exam)}}"><i
                                                            class="fa fa-paperclip"></i> Exam </a>
                                                </p>
                                            </div>
                                        </li>
                                    @empty
                                        <li>

                                            <div class="message_wrapper">
                                                <h4 class="heading">No Exams Found</h4>
                                                <br>

                                            </div>
                                        </li>

                                    @endforelse

                                </ul>
                                <!-- end of user messages -->


                            </div>


                        </div>

                        <!-- start project-detail sidebar -->
                        <div class="col-md-3 col-sm-3  ">

                            <section class="panel">

                                <div class="x_title">
                                    <h2>Course Description</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <h3 class="green"><i class="fa fa-paint-brush"></i> {{$course->name}}</h3>

                                    <p>{!! $course->description !!}</p>
                                    <br/>

                                    <div class="project_detail">

                                        <p class="title">Doctor</p>
                                        <p>{{$course->user->name}}</p>
                                    </div>
                                    <div class="profile_img">
                                        <h2>Course Image</h2>

                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" style="width: 100%; height: 100%"
                                                 src="{{$course->image_path}}" alt="Avatar" title="Change the avatar">
                                        </div>
                                    </div>
                                    <br/>

                                </div>

                            </section>

                        </div>
                        <!-- end project-detail sidebar -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
            integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // const config = {
        //     type: 'line',
        //     data: data,
        // };
        //
        // const labels = Utils.months({count: 7});
        // const data = {
        //     labels: labels,
        //     datasets: [{
        //         label: 'My First Dataset',
        //         data: [65, 59, 80, 81, 56, 55, 40],
        //         fill: false,
        //         borderColor: 'rgb(75, 192, 192)',
        //         tension: 0.1
        //     }]
        // };


    </script>

    <script>
        const labels = {!! json_encode($labels) !!};
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,

                    }
                }]
            }
        }
        const data = {
            labels: labels,
            datasets: [{
                label: 'Course Exams',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {!! json_encode($data) !!},

            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: options,

        };
        new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

@endsection
