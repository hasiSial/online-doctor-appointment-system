@extends('frontend.layout.main')
@section('content')

<!-- -->
<div class="container" style="margin-top:40px">
    <div class="row" style="padding-top:100px">
        <div class="col-md-4 mb-4 z-0">
            <div class="card shadow">
                <img src="{{ asset('frontend/images/bg-profile.jpg') }}" class="card-img-top" alt="Profile Background">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/users/' . $user->image) }}" class="rounded-circle mb-3" alt="Patient Profile" style="width: 100px; height: 100px; margin-top: -70px; object-fit: cover;">
                    <h4 class="card-text">{{$user->first_name}} {{$user->last_name}}</h4>
                    <p class="card-text" style="color: #8593A7">{{$user->age}} Years old</p>
                </div>
                <hr class="mt-0" style="border-top: 1px solid #000; margin-top:-1px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="fw-bold">Complete your profile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold text-end" style="color: #9ca8bd">90%</p>
                        </div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" style="width: 90%;"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1 mt-1">
                            <span class="text-primary"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">City</p>
                        </div>
                        <div class="col-7">
                            <p style="color: #8593A7">{{$user->city}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 mt-1">
                            <span class="text-primary"><i class="fa fa-phone"></i></span>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">Phone</p>
                        </div>
                        <div class="col-7">
                            <p style="color: #8593A7">{{$user->phone}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 mt-1">
                            <span class="text-primary"><i class="fas fa-envelope"></i></span>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">Email</p>
                        </div>
                        <div class="col-7">
                            <p style="color: #8593A7">{{$user->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 z-0">
            <div class="card border-0 shadow overflow-hidden">
                <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0">
                    <li class="nav-item">
                        <a class="active profile nav-link rounded-0" href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Profile</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="profile-setting nav-link rounded-0 " href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Profile Setting</h5>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- profile section -->
                <div class="row p-4" id="appointment-list">
                    <div class="col-md-12 ps-4 col-12 mt-4">
                        <h5 class="fw-bold">Appointments list</h5>
                        @if ($appointments->count() > 0)
                            <div class="table-responsive mt-4">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Doctor</th>
                                            <th scope="col text-center">Appt Time</th>
                                            <th scope="col text-center">Appt Date</th>
                                            <th scope="col text-center">Status</th>
                                            <th scope="col text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment )
                                        <tr class="">
                                            <th class="pt-3" scope="row">{{ $loop->iteration  }}</th>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-4 col-md-2">
                                                        <img src="{{ asset('storage/users/' . ($appointment->doctor->user->image ? $appointment->doctor->user->image : 'frontend/images/doc-profile.jpg')) }}" class="rounded-circle img-fluid" alt="Doctor Profile">
                                                    </div>
                                                    <div class="col-8 col-md-9">
                                                        <h6 class="mb-0 fs-5">{{ $appointment->doctor->specialist }}</h6>
                                                        <p class="text-muted mb-0 text-truncate small">Dr. {{ $appointment->doctor->user->first_name }} {{ $appointment->doctor->user->last_name }} </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pt-3">{{$appointment->appointment_time}}</td>
                                            <td class="pt-3">{{$appointment->appointment_date}}</td>
                                            <td class="pt-3">{{$appointment->status}}</td>
                                            <td class="pt-3">
                                                <button type="submit" class="btn btn-primary reject-btn" data-appoint-id="{{ $appointment->id }}" data-doc-id="{{ $appointment->doc_id }}" data-patient-id="{{ $appointment->patient_id }}">Reject</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- More rows here -->
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <h5 class="mt-3 mb-3">You have no appointment with any doctor! Thanks</h5>
                        @endif
                    </div>
                    
                </div>
                <!-- profile section end -->

                <!-- profile setting section -->
                <div class="row p-4" id="personal-information">
                    <div class="col-md-12 ps-4 col-12 mt-4">
                        <h5 class="fw-bold">Personal Information</h5>
                        <div class="row align-items-center mt-5">
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('storage/users/' . ($user->image ? $user->image : 'frontend/images/doc-profile.jpg')) }}" class="rounded-circle img-fluid" alt="Patient Profile" style="width: 100px; height: 100px; object-fit: cover;">
                                <!-- Product image input -->
                            </div>
                            <div class="col-8 col-md-6">
                                <h6 class="mb-0 fs-5">Upload your picture</h6>
                                <p class="text-muted mb-0 small" style="text-align: justify; color:#8492A6; font-size:16px">For best results, use an image at least 256px by 256px in either .jpg or .png format</p>
                            </div>
                            <div class="col-8 col-md-4">
                                <button type="submit" style="background:#396CF0;color:white;border:none;padding:8px 20px;border-radius:5px">Upload</button>
                                <button type="submit" style="background:#EBF0FD;color:396CF0;border:none;padding:8px 20px;border-radius:5px">Remove</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- form -->
                    <form method="" action="">
                        <div class="p-4">
                            <!-- input field group -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First name" name="first-name" value="{{$user->first_name}}" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name" name="last-name" value="{{$user->last_name}}" aria-label="Last name">
                                </div>
                            </div>

                            <!-- input field group -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$user->phone}}" aria-label="Last name">
                                </div>
                            </div>

                            <!-- input field group -->
                            <div class="mt-4">
                                <button type="submit" style="background:#396CF0;color:white;border:none;padding:8px 20px;border-radius:5px">Save Changes</button>
                            </div>
                        </div>
                    </form>

                    <!-- Change password section -->
                    <div class="p-4">
                        <h5 class="fw-bold">Change Password :</h5>
                        <form>
                            <!-- input field group -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Old password</label>
                                    <input type="text" class="form-control" placeholder="Old Password" name="old-password" value="" aria-label="First name">
                                </div>
                            </div>
                            <!-- input field group -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>New password</label>
                                    <input type="text" class="form-control" placeholder="New Password" name="new-password" value="" aria-label="First name">
                                </div>
                            </div>
                            <!-- input field group -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Re-type New password</label>
                                    <input type="text" class="form-control" placeholder="Re-type New password" name="re-new-password" value="" aria-label="First name">
                                </div>
                            </div>

                            <!-- input field group -->
                            <div class="mt-4">
                                <button type="submit" style="background:#396CF0;color:white;border:none;padding:8px 20px;border-radius:5px">Save Changes</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const appointList = document.querySelector("#appointment-list");
        const personalData = document.querySelector("#personal-information");
        personalData.style.display = "none";

        let profile = document.querySelector(".profile");
        let profileSetting = document.querySelector(".profile-setting");

        profileSetting.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            personalData.style.display = "block";
            appointList.style.display = "none";
            profile.classList.remove("active");
            profileSetting.classList.add("active");
        });

        profile.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            personalData.style.display = "none";
            appointList.style.display = "block";
            profile.classList.add("active");
            profileSetting.classList.remove("active");
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    //destory the appointment
    $(document).ready(function(){
        $('.reject-btn').click(function(){
            var appointID = $(this).data('appoint-id');
            var docID = $(this).data('doc-id');
            var patientID = $(this).data('patient-id');

            $.ajax({
                url: "{{ route('patient.appointment.reject') }}",
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                    appoint_id: appointID,
                    doc_id: docID,
                    patient_id: patientID
                },
                success: function(response) {
                    toastr.success('Appointment reject successfully!');
                    console.log(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to reject appointment!');
                    console.error(error);
                }
            });

        });
    });
</script>




