@extends('frontend.layout.main')

@section('content')

<div class="supersection d-flex flex-column justify-content-center align-items-center">
    <h5 class="fs-5 fw-bold text-white text-center">Online Doctor Appointment System</h5>
    <h1 class="fs-1 mt-3 fw-bold text-white">Consult Best Doctors Your Nearby Location</h1>
    <a href="{{route('register')}}">Register</a>
</div>

{{-- about odas section --}}

<div class="container mt-next">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 aboutImg">
            <img src="frontend/images/doctor.jpg" class="img-fluid" style="width: 100%; height: 525px; object-fit: cover-top;">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2 class="fs-2 fw-bold">Who We Are</h2>
            {{-- <hr class="custom-hr"> --}}
            <p class="fs-p">An online doctor appointment system is a digital platform 
                that allows patients to schedule appointments with doctors over the internet. 
                It replaces the traditional process of calling a medical facility to schedule 
                an appointment. This system offers benefits such as convenience, accessibility, 
                and flexibility to patients who could book appointments without any hassle around 
                the clock. This platform enables doctors to manage their schedules more efficiently, 
                reduce wait times, and improve their overall workflow. Patients can view the available
                dates and times for appointments, choose a suitable time slot to book, and receive reminders
                via email or text message before the scheduled appointment. if you need your family member to 
                get effective immediate assistance, examination, emergency treatment or a simple consultation. 
                Thank you.</p>
        </div>
    </div>
</div>

{{-- department section  --}}

<div class="container-fluid allDepart mt-next">
    <h5 class="fs-5 fw-bold text-white text-center">Departments</h5>
    <h2 class="fs-1 mt-3 fw-bold text-white text-center mb-5">Our Medical Services</h2>
    <div class="container">
        <div class="row align-items-start">
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.cardiology') }}" style="text-decoration: none">
                    <img src="frontend/images/home3.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Cardiology</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.eyecare') }}" style="text-decoration: none">
                    <img src="frontend/images/home4.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Eye Care</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.Pulmonary') }}" style="text-decoration: none">
                    <img src="frontend/images/home5.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Pulmonary</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.dentalCare') }}" style="text-decoration: none">
                    <img src="frontend/images/home6.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Dental Care</h5>
                </a>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.diagnostics') }}" style="text-decoration: none">
                    <img src="frontend/images/home7.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Diagnostics</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.disabled') }}" style="text-decoration: none">
                    <img src="frontend/images/home8.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">For disabled</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.traumotoligy') }}" style="text-decoration: none">
                    <img src="frontend/images/home9.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Traumotoligy</h5>
                </a>
            </div>
            <div class="col departBox text-center border border-2 rounded-3 m-2 pt-5 pb-5">
                <a href="{{ route('department.neurology') }}" style="text-decoration: none">
                    <img src="frontend/images/home10.png">
                    <h5 class="text-white fs-5 fw-bold pt-2">Neurology</h5>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- doctors section --}}

<div class="container text-center mt-next">
    <div class="row z-0">
        <div class="col">
            <h2 class="fs-2 fw-bold">Meet our Doctors</h2> 
            <p class="fs-p text-center ms-md-5 me-md-5">Great doctor if you need your family member to get effective immediate assistance,
                examination, emergency treatment or a simple consultation. Thank you.</p>
                <div class="row mt-5 mb-5">
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <img src="frontend/images/doctor-1-bg.png" class="card-img-top img-fluid" style="object-fit: cover;" alt="...">
                            <ul class="list-unstyled team-social" id="team-social">
                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <h5 class="card-title">Dr Calvin Carlo</h5>
                                <p class="card-text">Eye Care</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <img src="frontend/images/doctor-2-bg.png" class="card-img-top" alt="...">
                            <ul class="list-unstyled team-social" id="team-social">
                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <h5 class="card-title">Dr Alia Reddy</h5>
                                <p class="card-text">M.B.B.S, Psychotherapist</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <img src="frontend/images/doctor-6__2_-bg.png" class="card-img-top" alt="...">
                            <ul class="list-unstyled team-social" id="team-social">
                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <h5 class="card-title">Dr Toni</h5>
                                <p class="card-text">M.B.B.S, Orthopedic</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card">
                            <img src="frontend/images/doctor-5-bg.png" class="card-img-top" alt="...">
                            <ul class="list-unstyled team-social" id="team-social">
                                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/yourhandle" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <h5 class="card-title">Dr Jessica</h5>
                                <p class="card-text">Dentist</p>
                            </div>
                        </div>
                    </div>  
                </div> 
                <a href="{{route('doctors.index')}}" class="button mt-5">View All Doctors</a> 

                {{-- <a href="{{route('doctor')}}" class="button mt-5">View All Doctors</a> --}}
                {{-- <button type="submit" class="btn btn-primary">See More</button> --}}
            </div>
    </div>
</div>

@endsection

{{-- <script>

    //code for doctor
    document.addEventListener('DOMContentLoaded', function() {
        let cards = document.querySelectorAll(".card");

        cards.forEach(function(card) {
            let socialIcons = card.querySelector(".team-social");
            let cardBody = card.querySelector(".card-body");

            socialIcons.style.display = "none";

            card.addEventListener('mouseover', function() {
                socialIcons.style.display = "block";
                cardBody.style.backgroundColor = "#396cf01a";
            });

            card.addEventListener('mouseout', function() {
                socialIcons.style.display = "none";
                cardBody.style.backgroundColor = "";
            });
        });
    });

</script> --}}

