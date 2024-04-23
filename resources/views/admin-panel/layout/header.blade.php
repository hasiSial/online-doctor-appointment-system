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
    <!-- navigation end -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

       <!-- sidebar -->
       @include('admin-panel.layout.sidebar')
       <!-- sidebar end -->
       <!-- content section  -->
       @yield('main.content')


      
    </div>  

    <!-- footer -->
    
    <!-- footer end -->

  </div>
      <!-- content section end -->

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

  {{-- <script>
    // Get the button and the popup
    var openPopupBtn = document.getElementById('openPopup');
    var popup = document.getElementById('popup');

    // When the user clicks the button, show the popup
    openPopupBtn.addEventListener('click', function(e) {
        e.preventDefault();
        popup.style.display = 'block';
    });

    // Get the close button
    var closePopupBtn = document.getElementById('closePopup');

    // When the user clicks on the close button, hide the popup
    closePopupBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });

    // When the user clicks anywhere outside of the popup, close it
    window.addEventListener('click', function(event) {
        event.preventDefault();
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });
</script> --}}

  <!-- End custom js for this page-->


</body>

</html>