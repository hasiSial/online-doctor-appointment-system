<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #111845;">
      <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{ asset('frontend/images/logo_without_bg.png') }}" class="mr-2" alt="logo" style="height: 60px"/></a>
      {{-- <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{ asset('backend-admin/images/logo.svg') }}" class="mr-2 h-50" alt="logo"/></a> --}}
      <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('frontend/images/logo_plus.png') }}" alt="logo"/></a>

      {{-- <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('backend-admin/images/logo-mini.svg') }}" alt="logo"/></a> --}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{ asset('storage/users/' . (auth()->user()->image ? auth()->user()->image : 'frontend/images/doc-profile.jpg')) }}" class="rounded-circle img-fluid" alt="Doctor Profile">
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{route('profile.setting')}}">
              <i class="ti-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>