@extends('frontend.layout.main')

@section('content')

<div class="container-fluid super-section2">
    <h3>All Doctors</h3>
</div>

{{-- doctors section --}}

<div class="container text-center">
    @if(count($users)> 0)
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 col-xs-2 col-s-2">
            @foreach($users as $user)
            <div class="col-6 col-md-6 col-lg-3 mb-4 col-xs-2 col-s-2">
                <a href="{{ route('doctor.detail', $user->doctor->slug) }}">
                    <div class="card">
                        <img src="{{ asset('storage/users/' . $user->image) }}" 
                                class="card-img-top img-fluid w-100" style="object-fit: cover; aspect-ratio:4/4;" alt="No Image">
                        <div id="team-social">
                            <ul class="list-unstyled team-social">
                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                            {{-- <a href="{{ route('appointment', $user->doctor->slug) }}" class="btn btn-primary" style="margin-top: -40px">Appointment</a> --}}
                            {{-- <button type="submit" class="btn btn-primary" style="margin-top:-40px">Appointment</button> --}}
                        </div>
                        <div class="card-body">
                            <a href="{{ route('doctor.detail', $user->doctor->slug) }}" style="text-decoration: none">
                            {{-- <a href="{{ route('doctors.viewDoctorProfile', $user->doctor->slug) }}"> --}}
                                <h5 class="card-title">Dr. {{$user->first_name}} {{$user->last_name}}</h5>
                            </a>
                            @if($user->doctor)
                                <p class="card-text">{{ $user->doctor->specialist }}</p>
                            @else
                                <p class="card-text">No specialist information available</p>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div> 
    <!-- Pagination Links -->
    <div class="mt-5">
        {{ $users->links() }}
    </div>
    
    @else
    <div class="alert alert-primary" role="alert">
        Oops! No record found
    </div>
    @endif   
</div>

@endsection


