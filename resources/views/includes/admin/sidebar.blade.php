<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('index')}}" class="site_title"><i class="fa fa-paw"></i> <span>Exam System</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{auth()->user()->image_path}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{auth()->user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home </a>
                    </li>

                    <li><a ><i class="fa fa-desktop"></i> Courses <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{route('admin.courses.index')}}">All Courses</a></li>
                            @foreach($courses as $course)
                                <li><a href="{{route('admin.courses.show' , $course)}}">{{$course->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a ><i class="fa fa-edit"></i> Exams <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{route('admin.exams.index')}}">All exams</a></li>

                        @foreach($exams as $exam)
                                <li><a href="{{route('admin.exams.questions.index' , $exam)}}">{{$exam->name}}</a></li>

                            @endforeach


                        </ul>
                    </li>

                    <li><a href="{{route('admin.users.index')}}"><i class="fa fa-user"></i> Users </a>

                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

    </div>
</div>
