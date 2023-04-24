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

        <div >
            <section class="login_content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" required="" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>
                    <div>
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>
                    <div>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required="" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>
                    <div>
                        <button class="btn btn-default submit" >Register</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="{{route('login')}}" class="to_register"> Log in </a>
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
