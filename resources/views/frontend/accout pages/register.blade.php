@extends('layout.master')

@section('content')

<div class="supersection d-flex flex-column justify-content-center align-items-center">
    <h1 class="fs-1 mt-4 fw-bold text-white">Register To Website</h1>
</div>

<div class="container mt-next">
    <div class=" custom-shadow" style="margin:50px 200px; padding:60px">
        <form action="{{route('make.user')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                <label>First Name</label>    
                <input type="text" class="form-control" name="fname" placeholder="your first name" aria-label="First name">
                </div>
                <div class="col-6">
                <label>Last Name</label>  
                <input type="text" class="form-control" name="lname" placeholder="your last name" aria-label="Last name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                <label>Phone</label>    
                <input type="text" class="form-control" name="phone" placeholder="your phone" aria-label="First name">
                </div>
                <div class="col-6">
                <label>Email</label>  
                <input type="text" class="form-control" name="email" placeholder="your email" aria-label="Last name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                <label>User Name</label>    
                <input type="text" class="form-control" name="username" placeholder="your username" aria-label="First name">
                </div>
                <div class="col-6">
                <label>Password</label>  
                <input type="text" class="form-control" name="password" placeholder="your password" aria-label="Last name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3">
                <label>Country</label>    
                <input type="text" class="form-control" name="country" placeholder="your country" aria-label="country">
                </div>
                <div class="col-3">
                <label>state</label>  
                <input type="text" class="form-control" name="state" placeholder="your State" aria-label="provincy">
                </div>
                <div class="col-3">
                    <label>City</label>  
                    <input type="text" class="form-control" name="city" placeholder="your city" aria-label="city">
                </div>
                <div class="col-3">
                    <label>Role</label> 
                    <select class="form-select form-select-md mb-3" name="roleId" aria-label=".form-select-lg example">
                        <option selected disabled>select your role</option>
                        @foreach ($data as $id=> $student)    
                        <option value="{{$student->id}}">{{$student->role_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn mt-4 ">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection