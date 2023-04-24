@extends('includes.front.dashboard')


@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('assets/front/img/carousel-1.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                                <a href="{{route('login')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('assets/front/img/carousel-2.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                                <a href="{{route('login')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->





    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('assets/front/img/about.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to Exam System</h1>
                    <p class="mb-4">This exam system project is designed to provide a user-friendly and efficient platform for administering and taking online exams. With features like user authentication, exam creation, exam taking, and result management, this system is suitable for schools, universities, and other institutions that require a reliable online testing system.</p>
                    <p class="mb-4">In addition to creating and managing exams, the system also allows for customizable grading and question types, as well as the ability to generate reports on student performance. With these features, teachers can easily assess their students' knowledge and progress, and students can track their own performance over time.

                        Overall, this exam system project offers a comprehensive and scalable solution for conducting online exams that is both flexible and user-friendly.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->





    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">

                @forelse($courses as $index=>$course)

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{$index+1}}s">

                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden" style="">
                                <img class="img-fluid" style="width: 100% ; height: 300px" src="{{$course->image_path}}" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="{{route('courses.show' , $course)}}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 30px 30px 30px;">See More</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">

                                <h3 class="mb-4">{{$course->name}}</h3>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->user->name}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-table text-primary me-2"></i>{{$course->exams->count()}}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    There Are No Courses Yet
                @endforelse


                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                @forelse($users as $index=>$user)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{$index}}s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{$user->image_path}}" alt="">
                        </div>

                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$user->name}}</h5>
                        </div>
                    </div>
                </div>
                @empty
                    There Are No User <Yet></Yet>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End -->








@endsection
@section('js')

@endsection
