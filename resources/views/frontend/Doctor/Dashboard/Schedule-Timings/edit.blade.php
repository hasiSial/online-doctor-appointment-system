@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>Schedule Timings</h3>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="main-wrapper">

    <div class="content">
        <div class="container">
            <div class="row">
                <!-- display message -->
                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show position-relative" role="alert" id="sessionMessage">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{ session('message') }}</div>
                        <span aria-hidden="true" data-dismiss="alert" class="close text-black" style="cursor: pointer">&times;</span>
                    </div>
                </div>
                @endif
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('frontend.layout.sidebar')
                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">
                    @include('frontend.Doctor.Dashboard.Schedule-Timings.view-schedule-timing-template')

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script>
    $(document).ready(function() {
        $('.btn-add').on('click', function() {
            var $template = $('.repeater').clone();
            $template.removeClass('repeater');
            $template.addClass('repeater-item');
            $template.find('.btn-add').remove();
            $template.append('<div class="col-md-3 mt-2"><button type="button" class="btn btn-danger btn-remove">Remove</button></div>');

            $('.repeater-items').append($template);
        });

        $(document).on('click', '.btn-remove', function() {
            $(this).closest('.repeater-item').remove();
        });
    });

</script>

@endsection
