@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2">
    <h3>Make Your Appointment</h3>
</div>

<div class="container mt-5">
    <form method="post" action="">
        @csrf
        <div class="row justify-content-center">
            <!-- doctor detail -->
            <div class="col-lg-4 col-md-6 mb-4 z-0">
                <div class="card shadow">
                    <img src="{{ asset('frontend/images/bg-profile.jpg') }}" class="card-img-top" alt="Profile Background">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/users/' . $doctorInfo->user->image) }}" class="rounded-circle mb-3" alt="Doctor Profile" style="width: 100px;margin-top:-70px">
                        <h4 class="card-text">Dr. {{ $doctorInfo->user->first_name}} {{ $doctorInfo->user->last_name}}</h4>
                        <p class="card-text" style="color: #8593A7">{{ $doctorInfo->user->age}} Years old</p>
                    </div>
                    <hr class="mt-0" style="border-top: 1px solid #000; margin-top:-1px">
                    <div class="card-body">
                        <h5 class="text-center mb-4" style="margin-top:-10px">Further Information</h5>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Patient Name:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">{{ $user->first_name}} {{ $user->last_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Specialist:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">{{ $doctorInfo->specialist}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Fee:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">Rs {{ $doctorInfo->fee}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Phone:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">{{ $doctorInfo->user->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Email:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">{{ $doctorInfo->user->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-12 mt-1">
                                <span class="text-primary"><p>Address:</p></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <p class="">{{ $doctorInfo->clinic_address}}</p>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
            <!-- doctor detail end -->

            <!-- appointment form -->
            <div class="col-lg-8 col-md-6"> 
                <div class="card border-0 shadow overflow-hidden">
                    <!-- appointment time table -->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="me-3"><span class="fw-bold">Current Date: </span> <span id="currentDate"></span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-end align-items-center mb-3">
                                        <p class="me-3"><span class="fw-bold">Select Date:</span> <span><input type="date" id="date" data-doctor-id="{{$doctorInfo->id}}" required> </span></p> 
                                        <input type="hidden" data-doctor-id="{{$doctorInfo->id}}">
                                        <input type="hidden" data-doctor-name="{{ $doctorInfo->user->first_name}} {{ $doctorInfo->user->last_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 text-center mb-4 ">
                                    <div class="appointmentData"></div>
                                    <h4 id="slots-msg">Please Select One Date For Appointment!</h4>
                                </div>
                                <div class="spinner-border position-absolute" role="status" style="top: 50%; left:50%; display:none; color:#007bff" >
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div> 
                        </div>
                        {{-- <div class="row">
                            <div class="col-12 text-center mb-4">
                                <button type="button" class="btn btn-md btn-primary">Book An Appointment</button>
                            </div>
                        </div>  --}}
                    </div>
                    <!-- appointment time table end -->
                </div>
            </div>
            <!-- appointment form end -->
        </div>
    </form>
</div>


@endsection
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    
    //code for current date
    function updateCurrentDate() {
        var now = new Date();
        var currentDate = now.toLocaleDateString('en-US', {weekday:'long', day:'numeric', month:'long', year:'numeric' });
        document.getElementById('currentDate').innerText = currentDate;
    }
        // Call the function when the DOM content is loaded
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentDate();
        });
</script>


<script>
$(document).ready(function () {
    $('#date').change(function () {
        $('.appointmentData').hide();
        $('.spinner-border').show();
        var selectedDate = $('#date').val();
        var selectedDay = new Date(selectedDate).toLocaleString('en-us', { weekday: 'long' });
        var docID = $(this).data('doctor-id');

        // Make AJAX call
        $.ajax({
            url: '{{ route("get.date") }}',
            type: 'POST',
            data: {
                date: selectedDate,
                day: selectedDay,
                docID: docID
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.appointmentData').show()
                $('#slots-msg').hide();
                $('.spinner-border').hide();
                if (response.time_slots && response.time_slots.length > 0) {
                    var html = '<div class="row">';
                    var count = 0;
                    $.each(response.time_slots, function(index, slot) {
                        if (count % 4 === 0 && count !== 0) {
                            html += '</div><div class="row">';
                        }
                        html += '<div class="col-md-3">' +
                                    '<div class="calendar table-responsive">' +
                                        '<table class="table table-bordered">' +                                
                                            '<thead>' +
                                            '</thead>' +
                                            '<tbody class="text-center timeslots">' +
                                                '<tr>' +
                                                    '<td class="box">' +
                                                        slot.start_time + ' to ' + slot.end_time +
                                                        '<input type="hidden" data-date="' + response.date + '">' +
                                                    '</td>' +
                                                '</tr>' +
                                            '</tbody>' +
                                        '</table>' +
                                    '</div>' +
                                '</div>';
                        count++;
                    });
                    html += '</div>';
                    $('.appointmentData').html(html);
                } else {
                    console.log('No available time slots for the selected date.');
                    $('#no-slots-msg').html('<div class=""><p>No available time slots for the selected date. Please choose another date.</p></div>');
                }
            },
            error: function(xhr, status, error) {
                // toastr.error('Failed to add product to cart. Product may be out of stock.');
                // console.log(error);
            }
        });
    });

    // Event delegation for dynamically generated .box elements
    $('.appointmentData').on('click', '.box', function() {
        $('.box').not(this).removeClass('box-action');
        $(this).addClass('box-action');

        var time = $(this).text().trim();
        var docID = $('[data-doctor-id]').data('doctor-id');
        var docName = $('[data-doctor-name]').data('doctor-name');
        var date = $('[data-date]').data('date');

        // alert("Are you sure you want to make your appointment with Dr" + docName + " at " + time + "?");
            $.ajax({
            url: '{{ route("make.appointment") }}',
            type: 'POST',
            data: {
                date: date,
                time: time,
                docID: docID,
                docName: docName
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.error('appointment successfully make.');
                window.location.href = '{{ route("invoice") }}';
            },
            error: function(xhr, status, error) {
                // toastr.error('Failed to add product to cart. Product may be out of stock.');
                // console.log(error);
            }
        });

    });
});



</script>

    



<script>
    $(document).ready(function () {
        $('.box').on('click', function (event) {
            event.preventDefault(); 
    
            var time = $(this).find('.time-slot').text(); 
            var date = $('#date').val();
            alert(time); 
        });
    });
</script>











    


