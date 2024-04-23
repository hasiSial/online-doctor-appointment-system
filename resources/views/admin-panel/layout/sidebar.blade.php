<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-chart-line menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('my.appointments') }}">
        <i class="far fa-calendar-alt menu-icon"></i>
        <span class="menu-title">Appointments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('my.patients') }}">
        <i class="fas fa-procedures menu-icon"></i>
        <span class="menu-title">My Patients</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="far fa-hourglass menu-icon"></i>
        <span class="menu-title">Schedule Timings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('create.schedule.timing') }}">Create Schedule Timing</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('edit.schedule.timing') }}">Edit Schedule Timing</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile.setting') }}">
        <i class="fas fa-cogs menu-icon"></i>
        <span class="menu-title">Profie Setting</span>
      </a>
    </li>

  </ul>
</nav>