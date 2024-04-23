@extends('frontend.layout.main')
@section('content')

<div class="container h-100" style="margin-top: 150px">
    <div class="row justify-content-center"> <!-- Center the content horizontally -->
        <div class="col-md-6"> <!-- Adjust column width for smaller screens -->
            <div class="card">
                <div class="card-body">
                    <div class="row mt-4 justify-content-center"> <!-- Center the circle -->
                        <div class="col-2 text-center ms-3"> <!-- Adjust column width for smaller screens -->
                            <div class="invoice-circle">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-4"> <!-- Adjust column width for smaller screens -->
                            <h3>Appointment booked Successfully!</h3>
                            <p class="ps-md-5 pe-md-5">Appointment booked with Dr. {{ $appointmentData['docName'] }} on {{ $appointmentData['date'] }} at {{ $appointmentData['time'] }}</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-center mb-4"> <!-- Adjust column width for smaller screens -->
                            <button type="button" class="btn btn-md btn-primary">Back To Home</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection