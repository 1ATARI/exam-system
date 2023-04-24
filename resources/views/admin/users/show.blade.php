
@extends('includes.admin.dashboard')

@section('title' , $user->name)



@section('styles')
    <style>
        .open-image {
            max-width: 100%;
            max-height: 100%;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .open-image:hover {
            transform: scale(1.05);
        }

    </style>

@endsection
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$user->name}} details</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$user->name}} Report <small>Activity report</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view open-image" onclick="openModal(this.src)" width="100%" height="100%" src="{{$user->image_path}}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{$user->name}}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-at user-profile-icon"></i> {{$user->email}}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{$user->roles->first()->name}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-calendar user-profile-icon"> {{$user->created_at->format('d M Y')}}</i>
                                </li>
                            </ul>

                            <a class="btn btn-success" href="{{route('admin.users.edit' , $user)}}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4 class="mt-2">Exams {{$user->results->count()}}</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <p>Average Score {{$avg_result}}</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$avg_result}}"></div>
                                    </div>
                                </li>

                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 ">

                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>User Activity Report</h2>
                                </div>
                                <div class="col-md-6">
                                    <div id="" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                        <i class=" fa fa-calendar"></i>
                                        <span>January 1, {{date("Y")}} - December 30, {{date("Y")}}</span> <b class="caret"></b>
                                    </div>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <canvas  style="width:100%; height:280px;" id="myChart"></canvas>

                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" ><a href="#tab_content1" id="home-tab" class="active" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam Name</th>
                                                <th>Course Name</th>
                                                <th>Score</th>
                                                <th>Percentage</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($results as $index=>$result)

                                                <tr >
                                                <td>{{$index+1}}</td>
                                                <td>{{$result->exam->name}}</td>
                                                <td>{{$result->exam->course->name}}</td>
                                                <td class="hidden-phone">{{$result->result}} /{{$result->questions}} </td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress" data-toggle="tooltip" data-placement="top" title="{{$result->percentage}}" >
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="{{$result->percentage}}"></div>
                                                    </div>
                                                </td>

                                            </tr>

                                            @empty
                                                <tr>
                                                <h1 class="text-warning">No Exams Found</h1>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                        <!-- end user projects -->


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script>
        function openModal(src) {
            var modal = document.createElement("div");
            modal.style.position = "fixed";
            modal.style.top = "0";
            modal.style.bottom = "0";
            modal.style.left = "0";
            modal.style.right = "0";
            modal.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
            modal.style.zIndex = "9999";
            modal.onclick = function() {
                closeModal(modal);
            };

            var img = document.createElement("img");
            img.style.position = "fixed";
            img.style.top = "50%";
            img.style.left = "50%";
            img.style.transform = "translate(-50%, -50%)";
            img.style.maxWidth = "80%";
            img.style.maxHeight = "80%";
            img.style.display = "block";
            img.style.margin = "auto";
            img.src = src;

            modal.appendChild(img);
            document.body.appendChild(modal);
        }

        function closeModal(modal) {
            modal.parentElement.removeChild(modal);
        }
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
