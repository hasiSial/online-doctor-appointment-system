<div class="col-md-6 col-lg-4 col-xl-3">
    <div class="card widget-profile pat-widget-profile">
        <div class="card-body">
            <div class="pro-widget-content">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="{{ asset('storage/users/'. ($appointment->patient->user->image )) }}" alt="Patient Image" class="img-fluid">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">{{$appointment->patient->patient_name}}</a></h3>
                        <div class="patient-details">
                            <h5><b>Patient ID :</b> P00{{$appointment->patient->id}}</h5>
                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Alabama, USA</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="patient-info">
                <ul>
                    <li>Phone <span>{{$appointment->patient->user->phone}}</span></li>
                    <li>Email <span>{{$appointment->patient->user->email}}</span></li>
                    <li>Age <span>{{$appointment->patient->patient_age}} Years Old</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
