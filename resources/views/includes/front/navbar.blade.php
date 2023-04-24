<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Exam System</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{Route::current()->getName() == 'index' ? 'active':''}}">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link   {{Route::current()->getName() == 'about' ? 'active':''}} ">About</a>
            <a href="{{route('courses.index')}}" class="nav-item nav-link {{Route::current()->getName() == 'courses.index' ? 'active':''}}">Courses</a>

        </div>
        @auth
            <a href="{{route('dashboard')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Dashboard<i class="fa fa-arrow-right ms-3"></i></a>

        @endauth
        @guest
            <a href="{{route('login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        @endguest
    </div>
</nav>
