@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>Dashboard</h3>
</div>


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
                <!-- display side bar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('frontend.layout.sidebar')
                </div>
                <!-- display page content -->
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card dash-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar1">
                                                    <div class="circle-graph1" data-percent="75">
                                                        <img src="{{asset('admin/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Total Patient</h6>
                                                    <h3>1500</h3>
                                                    <p class="text-muted">Till Today</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar2">
                                                    <div class="circle-graph2" data-percent="65">
                                                        <img src="{{asset('admin/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Today Patient</h6>
                                                    <h3>160</h3>
                                                    <p class="text-muted">06, Nov 2023</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget">
                                                <div class="circle-bar circle-bar3">
                                                    <div class="circle-graph3" data-percent="50">
                                                        <img src="{{asset('admin/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Appoinments</h6>
                                                    <h3>85</h3>
                                                    <p class="text-muted">06, Apr 2023</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Patient Appoinment</h4>
                            <div class="appointment-tab">

                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="tab">Upcoming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#today-appointments" data-bs-toggle="tab">Today</a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane show active" id="upcoming-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Patient Name</th>
                                                                <th>Appt Date</th>
                                                                <th>Appt Time</th>
                                                                <th>Appt Status</th>
                                                                <th>Paid Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['appointments'] as $appointment)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('storage/users/' . $appointment->patient->user->image) }}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">{{$appointment->patient->patient_name}}</a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{$appointment->appointment_date}}</td>
                                                                <td><span class="d-block text-info">{{$appointment->appointment_time}}</span></td>
                                                                <td>{{$appointment->status}}</td>
                                                                <td>Rs {{$data['doctor']->fee}}</td>
                                                                <td>
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="today-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Patient Name</th>
                                                                <th>Appt Date</th>
                                                                <th>Appt Time</th>
                                                                <th>Appt Status</th>
                                                                <th>Paid Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data['appointments'] as $appointment)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{asset('admin/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Joan Gardner <span>#PT0006</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2023 <span class="d-block text-info">5.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td>$100</td>
                                                                <td>
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
