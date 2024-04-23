@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>Appointments</h3>
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
                @if ($data['appointments']->count() > 0)
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="appointment-tab">
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pending-appointments" data-bs-toggle="tab">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#approve-appointments" data-bs-toggle="tab">Approve</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#complete-appointments" data-bs-toggle="tab">Complete</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @foreach (['pending', 'approve', 'complete'] as $status)
                            @php
                            $filteredAppointments = $data['appointments']->where('status', $status);
                            @endphp

                            <div class="tab-pane{{ $loop->first ? ' show active' : '' }}" id="{{ $status }}-appointments">
                                <div class="container mt-5">
                                    @if ($filteredAppointments->isEmpty())
                                    <p>No {{ ucfirst($status) }} Appointments</p>
                                    @else
                                    @foreach ($filteredAppointments as $appointment)
                                    @include('frontend.Doctor.Dashboard.appintment-card-template', ['appointment' => $appointment])
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h3>You have no appointment with any patient!</h3>
            @endif
        </div>
    </div>
</div>
</div>

@endsection
