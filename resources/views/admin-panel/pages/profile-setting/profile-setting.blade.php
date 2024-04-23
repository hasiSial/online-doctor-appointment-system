@extends('admin-panel.layout.main')
@section('main.content')

<!-- content -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Profile Setting</h3>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- profile setting section -->
        @if (auth()->check())
            <div class="container mt-4">
                <div class="row p-4 card" id="personal-information">
                    <div class="col-md-12 ps-4 col-12 mt-4">
                        <h5 class="fw-bold">Personal Information</h5>
                        <div class="row align-items-center mt-5">
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('storage/users/'. $doctor->user->image) }}" class="rounded-circle img-fluid" alt="Patient Profile" style="width: 100px; height: 100px; object-fit: cover;">
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
                    <form method="Get" action="{{route('updateProfile.setting',$doctor->user->id)}}">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="p-4">
                            <!-- input field group for first and last name -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{$doctor->user->first_name}}" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{$doctor->user->last_name}}" aria-label="Last name">
                                </div>
                            </div>
        
                            <!-- input field group for email and phone -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{$doctor->user->email}}" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$doctor->user->phone}}" aria-label="Last name">
                                </div>
                            </div>

                            <!-- input field group for department and specialist -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Department</label>
                                    <select class="form-select form-select-lg" name="depart_id" aria-label="Default select example">
                                        <option disabled>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{$department->id == $doctor->depart_id ? 'selected' : ''}}>{{$department->depart_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Specialist</label>
                                    <input type="text" class="form-control" placeholder="Specialist" name="specialist" value="{{$doctor->specialist}}" aria-label="Last name">
                                </div>
                            </div>

                            <!-- input field group for fee and specialist -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Fee</label>
                                    <input type="text" class="form-control" placeholder="Fee" name="fee" value="{{$doctor->fee}}" aria-label="Last name">
                                </div>
                                <div class="col">
                                    <label>Clinic Address</label>
                                    <input type="text" class="form-control" placeholder="Clinic Address" name="clinic_address" value="{{$doctor->clinic_address}}" aria-label="Last name">
                                </div>
                            </div>

                            <!-- input field group for about -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>About</label>
                                    <textarea class="form-control" placeholder="About" name="about" aria-label="With textarea">{{$doctor->about}}</textarea>
                                </div>
                            </div>
                            <!-- input field group for experience -->
                            <div class="row g-3 mt-1">
                                <div class="col">
                                    <label>Experience</label>
                                    <textarea class="form-control" placeholder="Experience" name="experience" aria-label="With textarea">{{$doctor->experience}}</textarea>
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
        @else
            <h3>Please login first!</h3>
        @endif

    </div>
    <!-- partial:partials/_footer.html -->
    @include('admin-panel.layout.footer')
    <!-- partial -->
</div>

@endsection