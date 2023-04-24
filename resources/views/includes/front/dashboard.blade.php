<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Exam System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/front/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/front/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">

    @yield('styles')
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
@if(!(Route::current()->getName() == 'exams.questions'))
    @include('includes.front.navbar')

@endif

<!-- Navbar End -->
<!-- Content Start -->

    @yield('content')
<!-- Content End -->

<!-- Footer Start -->

<!-- Navbar Start -->
@if(!(Route::current()->getName() == 'exams.questions'))
    @include('includes.front.footer')

@endif

<!-- Content End -->




<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/front/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('assets/front/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('assets/front/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('assets/front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('assets/front/js/main.js')}}"></script>
@yield('js')
</body>

</html>
