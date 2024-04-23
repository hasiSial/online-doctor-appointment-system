@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>Password Changed</h3>
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
                        <div class="card-header text-center" style="font-size:22px; letter-spacing:1px">{{ __('Change Password') }}</div>

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
                            <form action="{{ route('user-password.updatePassword') }}" method="POST">
                                @csrf

                                <!-- Old Password Input -->
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">{{ __('Old Password') }}</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password">

                                    @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- New Password Input -->
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                    @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password Input -->
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password">

                                    @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
