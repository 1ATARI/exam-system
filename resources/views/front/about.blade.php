@extends('includes.front.dashboard')


@section('styles')
@endsection
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

                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact Me</h1>
            </div>
            <div class="row g-4">
                <div class=" fadeInUp" data-wow-delay="0.1s">
                    <h5>About me</h5>
                    <p class="mb-4">I am Youssef Mohamed computer science student in my final year at Kafrelsheikh University, as a student of
                        computer science, I have a strong foundation in programing
                        During my academic career, I have worked on various projects that have enhanced my skills
                        in programming, develop, mange projects in deference programing language
                        I am passionate about programming and always eager to learn new technologies.</p>
                    <a href="http://wa.me/+01092757979" target="_blank" class="btn btn-sm bg-teal btn-success">
                       <i class="fas fa-comments"></i> What's app
                    </a>
                    <a href="https://www.linkedin.com/in/youssef-mohamed-8b0718240/"   target="_blank" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> Linked In
                    </a>
                    <div class="d-flex align-items-center mb-3 mt-2">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Location</h5>
                            <p class="mb-0">Alexandria , Egypt</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">+20 109 757 979</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">yosifmohamed979@hotmail.com
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">

                    <a href="{{asset('uploads/CV.pdf')}}" download class="download-btn">
                        <button class="btn btn-primary"><i class="fa fa-download"></i> Download My CV</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')

@endsection
