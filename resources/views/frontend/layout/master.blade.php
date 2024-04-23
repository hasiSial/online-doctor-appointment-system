<!DOCTYPE html>
<html>
    <head>
        <title>ODAS</title>
        <link rel="stylesheet" href="frontend/css/style.css">
        <link rel="stylesheet" href="frontend/css/bootstrap.css">

    </head>
    <body>
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-header position-fixed">
                <div class="container-fluid">
                  <img src="frontend/images/logo_without_bg.png" class="img-fluid w-25" alt="Responsive image">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Departments</a>
                      </li>
                      <li class="nav-item ms-5">
                        <a class="nav-link" href="#">Doctors</a>
                      </li>
                      <li class="nav-item ms-5">
                        <a class="nav-link" href="#">My Appointments</a>
                      </li>
                    </ul>
                    <div id="loginpage">
                    <li class="nav-item me-4 list-unstyled">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                  </div>
                  </div>
                </div>
              </nav>
        </div>
        <main>
            <article>
                @yield('content')
            </article>
        </main>

        <div class="container-fluid bg-header pt-5 pb-5 mt-next">
            <div>
                <h1 class="fs-1 mt-5 fw-bold text-white text-center">Online Doctor Appointment System</h1>
                <hr class="custom-hr">
                <h5 class="fs-6 mt-4 fw-bold text-white text-center">Providing high-quality treatment services in Bahawalpur</h5>
            </div>
        </div>

    </body>
</html>

