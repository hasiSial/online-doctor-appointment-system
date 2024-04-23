{{-- <div class="container-fluid">
    <div class="row">

    </div>
</div> --}}
<!-- Logo and Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-header position-fixed sticky ps-3 pe-3 z-3 w-100">
    <div class="col-md-3">
        <!-- Logo with link to home -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend/images/logo_without_bg.png') }}" class="img-fluid w-75" style="object-fit: contain;" alt="Responsive image">
        </a>
        <!-- Navbar toggler button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-md-9">
        <!-- Navbar content -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <!-- Center-aligned navbar items -->
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link" href="#">{{ __('Departments') }}</a>
                    <ul class="submenu">
                        <li><a class="{{ Route::currentRouteNamed('department.cardiology') ? 'active' : '' }}" href="{{ route('department.cardiology') }}">Cardiology</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.eyecare') ? 'active' : '' }}" href="{{ route('department.eyecare') }}">Eye Care</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.pulmonary') ? 'active' : '' }}" href="{{ route('department.Pulmonary') }}">Pulmonary</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.dentalCare') ? 'active' : '' }}" href="{{ route('department.dentalCare') }}">Dental Care</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.diagnostics') ? 'active' : '' }}" href="{{ route('department.diagnostics') }}">Diagnostics</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.disabled') ? 'active' : '' }}" href="{{ route('department.disabled') }}">For Disabled</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.traumatology') ? 'active' : '' }}" href="{{ route('department.traumotoligy') }}">Traumatology</a></li>
                        <li><a class="{{ Route::currentRouteNamed('department.neurology') ? 'active' : '' }}" href="{{ route('department.neurology') }}">Neurology</a></li>s
                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('doctors.index') }}">{{ __('Doctors') }}</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="#">{{ __('About Us') }}</a>
                </li>
            </ul>

            <!-- Right-aligned navbar items -->
            <ul class="navbar-nav offset-3">
                @auth
                <!-- User is authenticated (logged in) -->
                <li class="mt-3">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Logout</button>
                    </form>
                </li>

                <!-- Display user-specific menu based on role -->
                @if (Auth::user()->role_id == 2)
                <!-- User role is patient (role_id = 1) -->
                <li>
                    <img src="{{ asset('storage/users/' . Auth::user()->image) }}" class="rounded-circle ms-3 mt-3" style="width: 50px; height: 50px; cursor: pointer;">

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('patient-profile', Auth::user()->id) }}" class="d-flex">
                                <i class="fas fa-columns mt-1 me-1"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex">
                                <i class="fa-regular fa-calendar-check mt-1 me-1"></i>
                                <span class="menu-title">Appointments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @elseif (Auth::user()->role_id == 1)
                <!-- User role is doctor (role_id = 2) -->
                <li>
                    <img src="{{ asset('storage/users/' . Auth::user()->image) }}" class="rounded-circle ms-3 mt-3" style="width: 50px; height: 50px; cursor: pointer;">

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('doctor-dashboard.index') }}" class="d-flex">
                                <i class="fas fa-columns mt-1 me-1"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex">
                                <i class="fa-regular fa-calendar-check mt-1 me-1"></i>
                                <span class="menu-title">Appointments</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('doctors.edit', Auth::user()->first_name)}}" class="d-flex">
                                <i class="fas fa-user-cog mt-1 me-1"></i>
                                <span class="menu-title">Profile Setting</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @else
                <!-- User is not authenticated (logged out) -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
