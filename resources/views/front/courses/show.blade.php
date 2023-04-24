@extends('includes.front.dashboard')


@section('styles')

@endsection
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{$course->name}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('courses.index')}}">Courses</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{$course->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->





    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{$course->image_path}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About {{$course->name}}}</h6>
                    <h1 class="mb-4">Welcome to {{$course->name}} Course</h1>
                    <p class="mb-4">{!! $course->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Exams</h6>
                <h1 class="mb-5">Course Exams</h1>
            </div>

            <div class="owl-carousel testimonial-carousel position-relative">
                @forelse($course->exams as $exam)
                    <a href="{{route('exams.confirm' , $exam)}}">
                <div class="testimonial-item text-center">
                    <h5 class="mb-0">{{$exam->name}}</h5>
                    <p>Duration {{$exam->duration}} <small>min</small></p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">{{$exam->questions->count()}} Questions </p>
                    </div>

                </div>

                    </a>

                @empty
                        <div class="testimonial-item text-center">
                            <h5 class="mb-0">There are no exam for this Course</h5>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">No Questions Found </p>
                            </div>

                        </div>



                @endforelse


            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection
@section('js')

@endsection
