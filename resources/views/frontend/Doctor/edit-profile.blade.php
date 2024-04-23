@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>Profile Setting</h3>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
{{-- {{dd($data['user'])}} --}}

<div class="main-wrapper">

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('frontend.layout.sidebar')
                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="card">
                        <div class="card-header text-center" style="font-size:22px; letter-spacing:1px">{{ __('Edit Your Profile') }}</div>

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
                            <form action="{{route('doctors.update', $data['doctor']->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Input field group for experience-->
                                <div class="row mt-5">
                                    <div class="col-md">
                                        <label for="experience">Experience</label>
                                        <textarea class="form-control form-control-solid @error('experience') is-invalid @enderror" id="experience" name="experience" placeholder="Write Your Experience" value="{{ old('experience') }}" required>{{$data['doctor']->experience}}</textarea>
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
                                        <select class="form-select form-select-lg mb-3" id="department" name="depart_id" required>
                                            <option selected disabled>Select Department</option>
                                            @foreach ($data['departs'] as $depart)
                                            <option value="{{ $depart->id }}" {{ $data['doctor']->depart_id == $depart->id ? 'selected' : '' }}>{{$depart->depart_name}}</option>
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
                                        <input type="text" class="form-control form-control-solid @error('specialist') is-invalid @enderror" id="specialist" name="specialist" value="{{ $data['doctor']->specialist ?? '' }}" placeholder="Write All Your Specialist" required>
                                        @error('specialist')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Input field group for Fee & Address-->
                                <div class="row">
                                    <div class="col-md">
                                        <label for="fee">Fee</label>
                                        <input type="text" class="form-control form-control-solid @error('fee') is-invalid @enderror" id="fee" name="fee" value="{{ $data['doctor']->fee }}" placeholder="What is your appointment fee" required>
                                        @error('fee')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="address">Clinic Address</label>
                                        <input type="text" class="form-control form-control-solid @error('clinic_address') is-invalid @enderror" id="address" name="clinic_address" value="{{ $data['doctor']->clinic_address }}" placeholder="Your Clinic Address" required>
                                        @error('clinic_address')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Input field group for Appointment time & day -->
                                {{-- <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="appoint-day">Select Available Day</label>
                                        <select class="form-select form-select-lg mb-3 fs-5" id="appoint-day" name="day[]">
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
                </div> --}}
                <div class="row appointmentData"></div>
                <!-- Text field group For bio-->
                <div class="row mt-3">
                    <div class="col-md">
                        <label for="bio">Write Your Bio Here</label>
                        <textarea class="form-control form-control-solid @error('about') is-invalid @enderror" id="bio" name="about" placeholder="Write Your Bio" value="{{ old('about') }}" required>{{$data['doctor']->about}}</textarea>
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
                    <button type="submit" style="background:#396CF0;color:white;border:none;padding:8px 20px;border-radius:5px">Update</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>

@endsection
