@extends('frontend.layout.main')
@section('content')

<div class="container-fluid super-section2 pt-4 pb-4">
    <h3>My Patients</h3>
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
                <div class="col-md-7 col-lg-8 col-xl-9">
                    @if ($data['appointments']->count())
                    <div class="row row-grid">
                        @foreach ($data['appointments'] as $appointment)
                        @include('frontend.Doctor.Dashboard.Patient.my-patient-card-template')
                        @endforeach
                    </div>

                    @else
                    <h4>No Recode Found!</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
