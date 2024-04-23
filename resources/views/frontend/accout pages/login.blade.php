@extends('frontend.layout.main')

@section('content')

<div class="supersection d-flex flex-column justify-content-center align-items-center">
    <h1 class="fs-1 mt-4 fw-bold text-white">Login To Website</h1>
</div>

<div class="container mt-next">
    <div class=" custom-shadow" style="margin:50px 250px; padding:80px">
        {{-- <form action="{{route('checklogin')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label>User Name</label>    
                    <input type="email" class="form-control" name="email" placeholder="user name" aria-label="First name">
                </div>
                <div class="col-12">
                    <label>Password</label>    
                    <input type="password" class="form-control" name="password" placeholder="user name" aria-label="First name">
                </div>
                
            </div>
            <div class="btn mt-4 ">
                <button type="submit">login</button>
                <a href="" class=" bg-success text-white rounded-2 pt-2 ps-4 pe-4 pb-2 text-decoration-none">Login</a>
                <a href="{{ route('register') }}" class=" bg-danger text-white rounded-2 pt-2 ps-4 pe-4 pb-2 text-decoration-none">Register</a>
            </div>
        </form> --}}
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
           <div class="fields">
               <div class="input-field">
                   <label for="un" >UserName</label>
                   <div class="inpt">
                       <input type="text" id="un" name="email"  placeholder="Enter UserName" required></div>
                   </div>
               </div>
               <div class="input-field">
                <label for="pw">Password</label>
                   <div class="inpt">
                       <input type="password" id="pw" name="password" placeholder="Enter Your password" required>
                   </div>
               </div>
               <div>
                   <input type="checkbox" id="rm" >
                   <label for="rm">Remember Me</label>
               </div>
               <div class="input-field-1">
                   <button type="submit">Login</button>
               </div>
           </div>
       </form>
    </div>
</div>

@endsection