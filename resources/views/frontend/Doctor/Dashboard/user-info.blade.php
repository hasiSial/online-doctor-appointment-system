@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>User Info</h3>
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
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="card">
                        <div class="card-header text-center" style="font-size:22px; letter-spacing:1px">{{ __('Edit User Info') }}</div>

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
                            <form action="{{route('user-info.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}

                                <!-- Doctor image -->
                                <div class="col-md-12 ps-4 col-12 mt-4">
                                    <h5 class="fw-bold">Personal Information</h5>
                                    {{-- <div class="row align-items-center mt-5">
                                        <div class="col-4 col-md-4">
                                            <img src="{{ $data['user']->image ? asset('storage/users/' . $data['user']->image) : asset('frontend/images/doctor-1.jpg') }}" class="rounded-circle img-fluid" alt="Patient Profile" style="width: 100px; height: 100px; object-fit: cover;" alt="" id="image-preview" />
                                    <!-- Product image input -->
                                    <input class="mt-3 form-control form-control-solid mb-2 @error('category_image') is-invalid @enderror" type="file" value="{{$data['user']->image}}" name="image" accept="image/*" onchange="previewImage();">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6 class="mb-0 fs-5">Upload your picture</h6>
                                    <p class="text-muted  small" style="text-align: justify; color:#8492A6; font-size:16px">For best results, use an image at least 256px by 256px in either .jpg or .png format</p>
                                </div>
                        </div> --}}

                        <div class="row align-items-center mt-5">
                            <div class="col-4 col-md-2">
                                <img src="{{ $data['user']->image ? asset('storage/users/' . $data['user']->image) : asset('frontend/images/doctor-1.jpg') }}" class="rounded img-fluid" alt="Patient Profile" style="width: 100px; height: 100px; object-fit: cover;" alt="" id="image-preview" />
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4 col-md-4">
                                <div class="change-photo-btn">
                                    <span>
                                        <i class="fa fa-upload"></i>
                                        Upload Photo
                                    </span>
                                    <input class="mt-3 form-control form-control-solid mb-2 @error('category_image') is-invalid @enderror" type="file" value="{{$data['user']->image}}" name="image" accept="image/*" onchange="previewImage();">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- First and Last Name -->
                    <div class="row mb-2 mt-3">
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ $data['user']->first_name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ $data['user']->last_name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Email and Phone Number -->
                    <div class="row mb-2">
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ $data['user']->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-12">
                                <input id="text" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $data['user']->phone }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Age and Country -->
                    <div class="row mb-2">
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('Age') }}</label>

                            <div class="col-md-12">
                                <input id="text" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $data['user']->age }}" required autocomplete="age">

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $data['user']->country }}" required autocomplete="country" autofocus>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- State and City -->
                    <div class="row mb-2">
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('State') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $data['user']->state }}" required autocomplete="state" autofocus>

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col mb-6">
                            <label for="name" class="col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $data['user']->city }}" required autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
