<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{ asset('storage/users/' . auth()->user()->image) }}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{$data['user']->first_name}} {{$data['user']->last_name}}</h3>
                <div class="patient-details">
                    <h5 class="mb-0">{{@$data['doctor']->specialist}} Specialist</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="menu-link {{ Route::currentRouteNamed('doctor-dashboard.*') ? 'active' : '' }}">
                    <a href="{{ route('doctor-dashboard.index') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::currentRouteNamed('appointments.*') ? 'active' : '' }}">
                    <a href="{{route('appointments.appointment')}}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::currentRouteNamed('my-patient.*') ? 'active' : '' }}">
                    <a href="{{route('my-patient.myPatient')}}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::currentRouteNamed('schedule-timing.edit') ? 'active' : '' }}">
                    <a href="{{route('schedule-timing.edit', auth()->user()->id)}}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>View Schedule Timings</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::currentRouteNamed('schedule-timing.create') ? 'active' : '' }}">
                    <a href="{{route('schedule-timing.create')}}">
                        <i class="fas fa-clock"></i>
                        <span>Create Schedule Timings</span>
                    </a>
                </li>
                <li>
                    <a href="invoices.html">
                        <i class="fas fa-file-invoice"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a href="accounts.html">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="reviews.html">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::CurrentRouteNamed('doctor-dashboard.*') ? 'active' : '' }}">
                    <a href="{{route('user.info')}} ">
                        <i class="fas fa-user-cog"></i>
                        <span>User Info</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::CurrentRouteNamed('doctors.*') ? 'active' : '' }}">
                    <a href="{{route('doctors.edit', auth()->user()->first_name)}} ">
                        <i class="fas fa-user"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li class="menu-link {{ Route::CurrentRouteNamed('user-password.*') ? 'active' : '' }}">
                    <a href="{{route('user-password.editPassword')}}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="social-media.html">
                        <i class="fas fa-share-alt"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
