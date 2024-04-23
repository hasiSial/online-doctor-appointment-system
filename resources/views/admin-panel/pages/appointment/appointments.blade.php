@extends('admin-panel.layout.main')
@section('main.content')

<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>All Appointments</h3>
                </div>
                <div class="col-md">
                    <div class="d-flex justify-content-end">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Appointments</option>
                            <option value="1">Today</option>
                            <option value="2">All</option>
                        </select>
                        <button class="btn btn-primary mx-2">Appointment</button>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- patient details card -->
        <div class="container mt-5">
            @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
            <div class="row border border-1 rounded mt-2">
                <div class="col-md-8">
                    <div class="row p-2 justify-content-center">
                        <div class="col-md-3 col-4">
                            <img class="w-100 border border-1 rounded" src="{{ asset('storage/users/'. $appointment->patient->user->image) }}">
                        </div>
                        <div class="col-md pt-sm-3 patient-card-content">
                            <h5>{{$appointment->patient->user->first_name}} {{$appointment->patient->user->last_name}}</h5>
                            <span>
                                <i class="fas fa-clock"></i>
                                {{$appointment->appointment_date}}, {{$appointment->appointment_time}}
                                {{-- 14 Nov 2023, 10.00 AM --}}
                            </span>
                            <br>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{$appointment->patient->user->city}}, {{$appointment->patient->user->state}}, {{$appointment->patient->user->country}}
                            </span>
                            <br class="mt-1">
                            <span>
                                <i class="fas fa-envelope"></i>
                                {{$appointment->patient->user->email}}
                            </span>
                            <br class="mt-1 mb-1">
                            <span>
                                <i class="fas fa-phone"></i>
                                {{$appointment->patient->user->phone}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    {{-- <a href="" class="rounded mb-2" id="openPopup" style="padding:5px 10px; background:#E0F6F6;text-decoration:none; color:#1DBEC2">
                            <i class="fas fa-eye"></i> View
                        </a> --}}
                    @if ($appointment->status == 'pending')
                    <a href="{{ route('update.status', $appointment->id) }}" class="rounded mx-2 mb-2" id="acceptLink" style="padding:5px 10px; background:#E2F6ED;text-decoration:none; color:#2CAF48">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="{{ route('delete.appointment', $appointment->id)}}" class="rounded mb-2" style="padding:5px 10px; background:#FDE2E7;text-decoration:none; color:#E63C3C">
                        <i class="fas fa-times"></i> Reject
                    </a>
                    @elseif ($appointment->status == 'confirm')
                    <a href="" class="rounded mx-2 mb-2" id="acceptLink" style="padding:5px 10px; background:#E2F6ED;text-decoration:none; color:#2CAF48">
                        status: confirm
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <h3>You have no appointment with any patient!</h3>
            @endif

        </div>

        <!-- The popup -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <!-- Content of the popup -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-left">Appointment Detail</h4>
                        <span class="close" id="closePopup">&times;</span>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                {{-- <img class="rounded-circle" style="width:120px; height:100px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                <h4 class="">Howard Tanner</h4> --}}
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:120px; height:100px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                </div>
                                <div class="col">
                                    <h4 class="">Howard Tanner</h4>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 d-flex">
                                    <h5>Age:</h5>
                                    <p class="mx-2 mt-0">25 year old</p>
                                </div>
                                <div class="col-6 d-flex">
                                    <h5>Date:</h5>
                                    <p class="mx-2 mt-0">20th Dec 2020</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 d-flex">
                                    <h5>Gender:</h5>
                                    <p class="mx-2 mt-0">Male</p>
                                </div>
                                <div class="col-6 d-flex">
                                    <h5>Time:</h5>
                                    <p class="mx-2 mt-0">11:00 AM</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 d-flex">
                                    <h5>Department:</h5>
                                    <p class="mx-2">Cardiology</p>
                                </div>
                                <div class="col-6 d-flex">
                                    <h5>Doctor:</h5>
                                    <p class="mx-2">Dr. Calvin Carlo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
    @include('admin-panel.layout.footer')
</div>


<!-- content end -->

@endsection
