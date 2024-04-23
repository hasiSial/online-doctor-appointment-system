@extends('frontend.layout.main')
@section('content')

<div class="container">
    <div class="row" style="margin-top: 150px">
        <div class="card" style="width: 100rem;">
            <div class="row ">
                <div class="col-xl-4 col-lg-4 col-md-5 position-relative">
                    <img src="{{ asset('storage/users/' . $data['doctor']->user->image)}}" class="img-fluid w-100" style="object-fit: cover; aspect-ratio:4/4;" alt="No Image">
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 ">
                    <div class="p-lg-5 p-4"></div>
                        @php
                        $currentTime = date('H:i');
                        $greeting = '';
                        if ($currentTime < '12:00') {
                            $greeting = 'Good Morning';
                        } elseif ($currentTime > '12:00' && $currentTime < '17:00' ) {
                            $greeting = 'Good Afternoon';
                        } elseif ($currentTime > '17:00' && $currentTime < '19:00' ) {
                            $greeting = 'Good Evening';
                        } else {
                            $greeting = 'Good Night';
                        }
                        @endphp
                        <h5 style="color: #000; font-weight:600">{{ $greeting }}!</h5>
                        <h3 style="color: #0D6EFD; font-weight:600">Dr. {{$data['doctor']->user->first_name}} {{$data['doctor']->user->last_name}}</h3>
                        <p style="color: #9593A7;">Trust our exceptional doctors for swift, expert care. From urgent emergencies to routine 
                            checkups, your loved ones are in safe hands with us.</p>
                            
                        {{-- <a href="{{ route('appointment', $data['doctor']->slug) }}" class="btn btn-primary">Appointment</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- btn detail section -->
        <div class="row mt-5">
            <div class="card" style="width: 100rem;">
                <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0">
                    <li class="nav-item">
                        <a class="active overview nav-link rounded-0" href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Overview</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="experience nav-link rounded-0 " href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Experience</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="location nav-link rounded-0 " href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Location</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="time-table nav-link rounded-0 " href="">
                            <div class="text-center pt-1 pb-1">
                                <h5 class="title fw-normal mb-0">Time Table</h5>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- btn detail section end -->

                <!-- overview Content -->
                <div class="row mt-4" id="overview-section">
                    <h4 style="color: #0D6EFD; font-weight:600">Dr. {{$data['doctor']->user->first_name}} {{$data['doctor']->user->last_name}}</h4>
                    <p>{{$data['doctor']->user->age}} year's old</p>
                    <p style="text-align: justify; color:#9593A7">{{$data['doctor']->about}}</p>
                    <h5 style="font-weight:600; color: #0D6EFD;">Specialties:</h5> 
                    <div class="d-flex align-items-center"> <!-- Added align-items-center class -->
                        <span class="me-1" style="color: #0D6EFD"><i class="fas fa-arrow-right"></i></span>
                        <p style="color:#9593A7; margin-bottom: 0;">{{$data['doctor']->specialist}}</p> 
                    </div>
                    <h5 style="font-weight:600; color: #0D6EFD;">Related Doctor:</h5>  
                    <div class="container text-center">
                        @if(count($data)> 0)
                        <div class="row">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 col-xs-2 col-s-2">
                                @foreach($data['relatedDoctors'] as $doctor)
                                <div class="col-6 col-md-6 col-lg-3 mb-4 col-xs-2 col-s-2">
                                    <div class="card">
                                        <img src="{{ asset('storage/users/' . $doctor->user->image) }}" class="card-img-top img-fluid w-100" style="object-fit: cover; aspect-ratio:4/4;" alt="No Image">
                                        <div id="team-social">
                                            {{-- <ul class="list-unstyled team-social">
                                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            </ul> --}}
                                            {{-- <a href="{{ route('appointment', $user->doctor->slug) }}" class="btn btn-primary" style="margin-top: -40px">Appointment</a> --}}
                                            {{-- <button type="submit" class="btn btn-primary" style="margin-top:-40px">Appointment</button> --}}
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('doctor.detail', $doctor->slug) }}" style="text-decoration: none">
                                                <h5 class="card-title">Dr. {{$doctor->user->first_name}} {{$doctor->user->last_name}}</h5>
                                            </a>
                                            <p class="card-text">{{ $doctor->specialist }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        @else
                        <div class="alert alert-primary" role="alert">
                            Oops! No record found
                        </div>
                        @endif   
                    </div> 
                </div>
                <!-- overview Content end -->

                <!-- experience content section -->
                <div class="row mt-4" id="experience-section">
                    <h5 style="color: #0D6EFD; font-weight:600">Experience:</h5>
                    <p style="text-align: justify; color:#9593A7">{{$data['doctor']->experience}}</p>   
                </div>
                <!-- experience content section end -->

                <!-- time_table content section -->
                <div class="row mt-5" id="timeTable">
                    <div class="col-md-4 mb-4">
                        <div class="card p-4">
                            <span class="mx-auto mb-3" style="color: #0D6EFD; font-size:25px;background:#ebfbfd; padding:10px 20px; border-radius:5px">
                                <i class="fa-regular fa-calendar-check"></i>
                            </span>
                            @foreach ($data['appointments'] as $appointment )
                                
                            
                            <div class="row">
                                <div class="col-5 d-flex align-items-center">
                                    <p class="me-1 mb-0">Day:</p>
                                    <p class="mb-0" style="color:#9593A7">{{$appointment->day}}</p>
                                </div>                                
                                <div class="col-7 d-flex align-items-center">
                                    @php
                                        $startTime = $appointment->start_time;
                                        $endTime = $appointment->end_time;

                                        $formattedStartTime = date('g:i A', strtotime($startTime));
                                        $formattedEndTime = date('g:i A', strtotime($endTime));
                                    @endphp
                                    <span class="me-1" style="color: #0D6EFD;"><i class="fas fa-clock"></i></span>
                                    <p class="mb-0" style="color: #0D6EFD;">{{$formattedStartTime}} - {{$formattedEndTime}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    </div>
                    <div class="col-md-4 mb-4 text-center">
                        <div class="card">
                            <span class="mx-auto mt-4" style="color: #0D6EFD; font-size:25px;background:#ebfbfd; padding:10px 20px; border-radius:5px">
                                <i class="fas fa-phone"></i>
                            </span>
                            <h5 class="mt-1" style="color: #000; font-weight:600">Phone</h5>
                            <p style="color:#9593A7">Great doctor if you need your family member to get effective immediate assistance</p>
                            <p style="color: #0D6EFD;">{{$data['doctor']->user->phone}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 text-center">
                        <div class="card">
                            <span class="mx-auto mt-4" style="color: #0D6EFD; font-size:25px;background:#ebfbfd; padding:10px 20px; border-radius:5px">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <h5 class="mt-1" style="color: #000; font-weight:600">Email</h5>
                            <p style="color:#9593A7">Great doctor if you need your family member to get effective immediate assistance</p>
                            <p style="color: #0D6EFD;">{{$data['doctor']->user->email}}</p>
                        </div>
                    </div>
                </div>
                
                <!-- time_table content section -->
            </div>
        </div>
    </div>
</div>


@endsection

<script> 
    // code for getting doctor info
    document.addEventListener("DOMContentLoaded", function() {
        // btn
        let overview = document.querySelector('.overview');
        let experience = document.querySelector('.experience');
        let location = document.querySelector('.location');
        let time_table = document.querySelector('.time-table');

        //content
        let overview_Section = document.querySelector('#overview-section');
        overview_Section.style.display = 'block';

        let experience_Section = document.querySelector('#experience-section');
        experience_Section.style.display = "none";

        let timeTable_Section = document.querySelector('#timeTable');
        timeTable_Section.style.display = 'none';

        //section
        overview.addEventListener('click', (event) => {
            event.preventDefault();
            overview_Section.style.display = 'block';
            experience_Section.style.display = 'none';
            timeTable_Section.style.display = 'none';

            overview.classList.add("active");
            experience.classList.remove("active");
            time_table.classList.remove("active");


        });

        experience.addEventListener('click', (event) => {
            event.preventDefault();
            overview_Section.style.display = 'none';
            experience_Section.style.display = 'block';
            timeTable_Section.style.display = 'none';

            overview.classList.remove("active");
            experience.classList.add("active");
            time_table.classList.remove("active");
        });

        time_table.addEventListener('click', (event) => {
            event.preventDefault();
            overview_Section.style.display = 'none';
            experience_Section.style.display = 'none';
            timeTable_Section.style.display = 'flex';

            overview.classList.remove("active");
            experience.classList.remove("active");
            time_table.classList.add("active");
        });


    });
</script>