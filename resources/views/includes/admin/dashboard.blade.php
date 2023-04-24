<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/admin/images/favicon.ico')}}" type="image/ico"/>

    <title>@yield('title') </title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('assets/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">

    <style>

        .cke_button.cke_button__source.cke_button_off{
            display: none;
        }

    </style>

    @yield('styles')


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @if(auth()->user()->hasRole('Doctor') && !Str::startsWith(Route::current()->getName(), 'student.'))
            @include('includes.admin.sidebar')
        @else
            @include('includes.student.sidebar')
        @endif
        <!-- top navigation -->

        @include('includes.admin.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">


            @yield('content')


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('assets/admin/build/js/custom.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('assets/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('assets/admin/vendors/nprogress/nprogress.js')}}"></script>

<script src="{{asset('assets/admin/custom/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>

<!-- bootstrap-progressbar -->

<script src="{{asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>


@yield('js')

</body>

</html>
