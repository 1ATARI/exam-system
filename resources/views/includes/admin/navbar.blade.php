<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                       data-toggle="dropdown" aria-expanded="false">
                        <img src="{{auth()->user()->image_path}}" alt="">{{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('profile.edit')}}"> Profile</a>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i> Log
                                Out
                            </button>
                        </form>
                    </div>
                </li>
                @if(auth()->user()->hasRole('Doctor'))
                    @if(!Str::startsWith(Route::current()->getName(), 'student.'))
                        <a href="{{route('student.dashboard')}}">
                            <li role="presentation" class="nav-item">
                                <i class="fa fa-graduation-cap"></i>

                                Student Dashboard
                            </li>
                        </a>
                    @else
                        <a href="{{route('admin.dashboard')}}">
                            <li role="presentation" class="nav-item">
                                <i class="fa fa-user"> </i> Admin Dashboard
                            </li>
                        </a>
                    @endif


                @endif
            </ul>
        </nav>
    </div>
</div>
