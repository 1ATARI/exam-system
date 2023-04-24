<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task management | </title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('assets/admin/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">
</head>


<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="email" required="" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Log in</button>
                        @if (Route::has('password.request'))

                        <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                        @endif

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="{{route('register')}}" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Exam System</h1>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>
</body>

</head>
</html>
