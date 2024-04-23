@extends('frontend.layout.main')
@section('content')

<!-- -->
@if ($errors->has('message'))
<div class="alert alert-danger">{{ $errors->first('message') }}</div>
@endif

<div class="container" style="margin-top:40px">
    <div class="row" style="padding-top:100px">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('frontend/images/bg-profile.jpg') }}" class="card-img-top" alt="Profile Background">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/users/'. $data['user']-> image) }}" class="img-fluid rounded-circle mb-3" alt="Doctor Profile" style="width:100px; margin-top:-70px; object-fit: contain;">

                    <h4 class="card-text">Dr. {{$data['user']->first_name}} {{$data['user']->last_name}}</h4>
                    <p class="card-text" style="color: #8593A7">{{$data['user']->age}} year's old</p>
                </div>
                <hr class="mt-0" style="border-top: 1px solid #000; margin-top:-1px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="fw-bold">Complete your profile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold text-end" style="color: #9ca8bd">35%</p>
                        </div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" style="width: 35%;"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1 mt-1">
                            <span class="text-primary"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">Profession</p>
                        </div>
                        <div class="col-7">
                            <p style="color: #8593A7">Doctor</p>
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
                            <p style="color: #8593A7">{{$data['user']->phone}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 mt-1">
                            <span class="text-primary"><i class="fas fa-envelope "></i></span>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">Email</p>
                        </div>
                        <div class="col-7">
                            <p style="color: #8593A7">{{$data['user']->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size:22px; letter-spacing:1px">{{ __('Make Your Profile') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        Please fix the following errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('doctors.store')}}" method="POST">
                        @csrf
                        <!-- Input field group for experience-->
                        <div class="row">
                            <div class="col-md">
                                <label for="experience">Experience</label>
                                <input type="text" class="form-control form-control-solid @error('experience') is-invalid @enderror" id="experience" name="experience" placeholder="Write All Your Experience" value="{{ old('experience') }}" required>
                                @error('experience')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Input field group for Department & Specialist -->
                        <div class="row mt-3">
                            <div class="col-md">
                                <label for="department">Select Department</label>
                                <select class="form-select" id="department" name="depart_id" required>
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($data['departs'] as $depart)
                                    <option value="{{$depart->id}}">{{$depart->depart_name}}</option>
                                    @endforeach
                                </select>
                                @error('depart_id')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label for="specialist">Specialist</label>
                                <input type="text" class="form-control form-control-solid @error('specialist') is-invalid @enderror" id="specialist" name="specialist" value="{{ old('specialist') }}" placeholder="Write All Your Specialist" required>
                                @error('specialist')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Input field group for Fee & Address-->
                        <div class="row mt-3">
                            <div class="col-md">
                                <label for="fee">Fee</label>
                                <input type="text" class="form-control form-control-solid @error('fee') is-invalid @enderror" id="fee" name="fee" value="{{ old('fee') }}" placeholder="What is your appointment fee" required>
                                @error('fee')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label for="address">Clinic Address</label>
                                <input type="text" class="form-control form-control-solid @error('clinic_address') is-invalid @enderror" id="address" name="clinic_address" value="{{ old('clinic_address') }}" placeholder="Your Clinic Address" required>
                                @error('clinic_address')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Input field group for Appointment time & day -->
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="appoint-day">Select Available Day</label>
                                <select class="form-select" id="appoint-day" name="day[]">
                                    <option selected disabled>Select days</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                                @error('day')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="start-time">Select Start Time:</label>
                                <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{ old('start_time') }}" required>
                                @error('start_time')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="end-time">Select End Time:</label>
                                <input class="form-control form-control-solid @error('end_time') is-invalid @enderror" type="time" id="end_time" name="end_time[]" value="{{ old('end_time') }}" required>
                                @error('end_time')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary  mt-4 add-button">Add More</button>
                            </div>
                        </div>
                        <div class="row appointmentData"></div>
                        <!-- Text field group For bio-->
                        <div class="row mt-3">
                            <div class="col-md">
                                <label for="bio">Write Your Bio Here</label>
                                <textarea class="form-control form-control-solid @error('about') is-invalid @enderror" id="bio" name="about" placeholder="Write Your Bio" value="{{ old('about') }}" required></textarea>
                                @error('about')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- input field group -->
                        <div class="mt-4">
                            <button type="submit" style="background:#396CF0;color:white;border:none;padding:8px 20px;border-radius:5px">Create</button>
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
        const addBtn = document.querySelector(".add-button");
        const appointmentData = document.querySelector(".appointmentData");

        addBtn.addEventListener("click", () => {
            let listItem = document.createElement("div");
            listItem.classList.add("col-12"); // Set the new row to take full width
            listItem.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <label>Select Available Day</label>
                        <select class="form-select form-select-md mb-3" name="day[]" aria-label="Large select example">
                            <option disabled>select days</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="time">Select Start Time:</label>
                        <br>
                        <input class="form-control" type="time" id="time" name="start_time[]" style="width: 100%">
                    </div>
                    <div class="col-md-3">
                        <label for="time">Select End Time:</label>
                        <br>
                        <input class="form-control" type="time" id="time" name="end_time[]" style="width: 100%">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-danger mt-4 delete-button">Delete</button>
                    </div>
                </div>
            `;
            appointmentData.appendChild(listItem);
        });

        // Add event delegation for the delete button
        appointmentData.addEventListener("click", event => {
            if (event.target.classList.contains("delete-button")) {
                event.target.closest(".col-12").remove(); // Remove the parent row
            }
        });
    });

</script>
