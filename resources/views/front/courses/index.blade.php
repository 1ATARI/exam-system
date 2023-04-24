@extends('includes.front.dashboard')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">Home</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Our Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">

                @forelse($courses as $course)

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

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
    <!-- Courses End -->






@endsection

