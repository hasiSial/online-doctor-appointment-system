@extends('admin-panel.layout.main')
@section('main.content')

<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>All Patients</h3>
                </div>
            </div>
        </div>
        <!-- all patients -->
        <div class="container mt-5">
            <div class="row">
                @foreach ($appointments as $appointment)
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:70px; height:70px" src="{{ asset('storage/users/' .$appointment->patient->user->image ) }}">
                                </div>
                                <div class="col">
                                    <p class="fs-5 fw-bold" style="margin-left: 55px">{{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Age:</h6>
                                        <p class="mx-2 mt-0">{{ $appointment->patient->user->age }} year old</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Email:</h6>
                                        <p class="mx-2 mt-0">{{ $appointment->patient->user->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Ph:</h6>
                                        <p class="mx-2 mt-0">{{ $appointment->patient->user->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            

            {{-- <div class="row">
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:70px; height:70px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                </div>
                                <div class="col">
                                    <p class="fs-5 fw-bold" style="margin-left: 55px">Howard Tanner</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Age:</h6>
                                        <p class="mx-2 mt-0">25 year old</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Phone:</h6>
                                        <p class="mx-2 mt-0">0311-2315465</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Email:</h6>
                                        <p class="mx-2 mt-0">howard@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:70px; height:70px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                </div>
                                <div class="col">
                                    <p class="fs-5 fw-bold" style="margin-left: 55px">Howard Tanner</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Age:</h6>
                                        <p class="mx-2 mt-0">25 year old</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Phone:</h6>
                                        <p class="mx-2 mt-0">0311-2315465</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Email:</h6>
                                        <p class="mx-2 mt-0">howard@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:70px; height:70px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                </div>
                                <div class="col">
                                    <p class="fs-5 fw-bold" style="margin-left: 55px">Howard Tanner</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Age:</h6>
                                        <p class="mx-2 mt-0">25 year old</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Phone:</h6>
                                        <p class="mx-2 mt-0">0311-2315465</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Email:</h6>
                                        <p class="mx-2 mt-0">howard@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img class="rounded-circle" style="width:70px; height:70px" src="{{ asset('frontend/images/doctor-1.jpg') }}">
                                </div>
                                <div class="col">
                                    <p class="fs-5 fw-bold" style="margin-left: 55px">Howard Tanner</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Age:</h6>
                                        <p class="mx-2 mt-0">25 year old</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Phone:</h6>
                                        <p class="mx-2 mt-0">0311-2315465</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <h6 class="fw-bold">Email:</h6>
                                        <p class="mx-2 mt-0">howard@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
        


    </div>
    <!-- partial:partials/_footer.html -->
    @include('admin-panel.layout.footer')
    <!-- partial -->
</div>


@endsection