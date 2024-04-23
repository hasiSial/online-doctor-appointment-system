<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MKiKpsBpP1Nap0EE0v43L/yDSDC3zPPcHFfTqUGv4kTPv96XbEu5Lc3spkWw/aWF0DHbpKVvzP/vUy2VX3GHCKQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css" integrity="sha512-TzeemgHmrSO404wTLeBd76DmPp5TjWY/f2SyZC6/3LsutDYMVYfOx2uh894kr0j9UM6x39LFHKTeLn99iz378A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toastr CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ODAS</title>

    <!-- CSS And Bootstrap -->

    {{-- <link rel="stylesheet" href="frontend/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    <!-- doctor patient dashboard asset -->
    <link href="{{asset('admin/img/favicon.png')}}" rel="icon">
    {{-- <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

</head>
<header>

    @include('frontend.layout.header')

</header>
<body>
    <main class="py-4" id="main">
        @yield('content')
    </main>


    <!-- JS for doctor and patient dashoboard.  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('admin/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <script src="{{ asset('admin/js/circle-progress.min.js') }}"></script>

    <script src="{{ asset('admin/js/script.js') }}"></script>

    <!-- Include Cloudflare Rocket Loader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudflare/2.3.0/rocket-loader.min.js" data-cf-settings="dcbcfc4e109e62e3986328-|49" defer></script>

</body>

<!-- Custom JS for specific page.  -->
@stack('script')


@include('frontend.layout.footer')


<script>
    //code for doctor
    document.addEventListener('DOMContentLoaded', function() {
        let cards = document.querySelectorAll(".card");

        cards.forEach(function(card) {
            let socialIcons = card.querySelector("#team-social");
            let cardBody = card.querySelector(".card-body");

            socialIcons.style.display = "none";

            card.addEventListener('mouseover', function() {
                socialIcons.style.display = "block";
                cardBody.style.backgroundColor = "#396cf01a";
            });

            card.addEventListener('mouseout', function() {
                socialIcons.style.display = "none";
                cardBody.style.backgroundColor = "";
            });
        });
    });

</script>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Find the close button and attach a click event listener
        const closeButton = document.querySelector('.alert .close');
        if (closeButton) {
            closeButton.addEventListener('click', function() {
                // Find the alert container and remove it from the DOM
                const alertContainer = document.querySelector('#sessionMessage');
                if (alertContainer) {
                    alertContainer.remove();
                }
            });
        }
    });

</script>



</html>
