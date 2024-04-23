{{-- @extends('admin-panel.layout.main')
@section('main.content')

@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ODAS</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="{{ asset('backend-admin/vendors/feather/feather.css')}}">

   <link rel="stylesheet" href="{{ asset('backend-admin/vendors/ti-icons/css/themify-icons.css')}}">
   <link rel="stylesheet" href="{{ asset('backend-admin/vendors/css/vendor.bundle.base.css')}}">
   <!-- endinject -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="{{ asset('backend-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
   <link rel="stylesheet" href="{{ asset('backend-admin/vendors/ti-icons/css/themify-icons.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('backend-admin/js/select.dataTables.min.css')}}">
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="{{ asset('backend-admin/css/vertical-layout-light/style.css')}}">
   <!-- endinject -->
   <link rel="shortcut icon" href="{{ asset('backend-admin/images/favicon.png')}}" />
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
   <!-- Bootstrap css -->
   <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MKiKpsBpP1Nap0EE0v43L/yDSDC3zPPcHFfTqUGv4kTPv96XbEu5Lc3spkWw/aWF0DHbpKVvzP/vUy2VX3GHCKQ==" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css" integrity="sha512-TzeemgHmrSO404wTLeBd76DmPp5TjWY/f2SyZC6/3LsutDYMVYfOx2uh894kr0j9UM6x39LFHKTeLn99iz378A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
 
   <!-- Toastr link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
 </head>
 <body>
    <div class="container-scroller">
        <!-- navigation -->
        @include('admin-panel.layout.nav')
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('frontend/images/bg-profile.jpg') }}" class="card-img-top" alt="Profile Background">
                    <div class="card-body text-center">
                        <img src="frontend/images/doctor-13.jpg" class="rounded-circle mb-3" alt="Patient Profile" style="width: 100px; height: 100px; object-fit: cover; margin-top: -70px;">
                        <h4 class="card-text">Dr. Ayesha Aslam</h4>
                        <p class="card-text" style="color: #8593A7;">38 Years old</p>
                    </div>
                    <hr class="mt-0" style="border-top: 1px solid #000; margin-top: -1px;">
                    <div class="card-body">
                        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                            <ul class="nav flex-column">
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
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('create.schedule.timing') }}">Create Schedule Timing</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('edit.schedule.timing') }}">Edit Schedule Timing</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile.setting') }}">
                                        <i class="fas fa-cogs menu-icon"></i>
                                        <span class="menu-title">Profile Setting</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- top carts -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 mt-4">
                        <div class="card shadow border-0 p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="align-items-center mb-0">Appointment
                                    <span class="badge rounded-pill bg-soft-primary ms-1">+15%</span>
                                </h6>
                                <p class="mb-0 text-muted">220+ Week</p>
                            </div>
                            <div class="chart-container" id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid bg-header pt-5">
        <div class="container">
            <div class="row footer-end text-center">
                <div class="col-12">
                    <p class="fw-bold" style="color: #dddd;">2024 © ODAS. Design & Develop with <i class="fa-solid fa-heart" style="color:#fc5c40; "></i> <span style="cursor: pointer;">by Haseeb Ur Rehman.</span> </p>
                </div>
            </div>
        </div>
    </div>

    

    <!-- plugins:js -->
    <script src="{{ asset('backend-admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend-admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend-admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('backend-admin/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend-admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend-admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend-admin/js/template.js') }}"></script>
    <script src="{{ asset('backend-admin/js/settings.js') }}"></script>
    <script src="{{ asset('backend-admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend-admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend-admin/js/Chart.roundedBarCharts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get current date
    var currentDate = new Date();

    // Array of weekday names
    var weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Generate data for the current week
    var data = [];
    for (var i = 0; i < 7; i++) {
        var date = new Date(currentDate);
        date.setDate(currentDate.getDate() - currentDate.getDay() + i);
        var dayName = weekdays[date.getDay()];
        var appointments = Math.floor(Math.random() * 100); // Random appointments for demo
        data.push({
            x: dayName,
            y: appointments
        });
    }

    var options = {
        series: [{
            name: 'Appointments',
            data: data
        }],
        chart: {
            type: 'area',
            height: 250, // Adjust height based on container size
            width: '100%',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'category',
            categories: weekdays // Use only weekdays
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});
</script>

 </body>

 


 </html> 
