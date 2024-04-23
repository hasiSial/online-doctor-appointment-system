<!-- CSS And Bootstrap -->

<link rel="stylesheet" href="frontend/css/style.css">
<link rel="stylesheet" href="frontend/css/bootstrap.css">
<div class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" id="loginCard">
                <div class="card" style="margin:50px 100px;">
                    <div class="card-header text-center">{{ __('Register') }}</div>

                    <div class="card-body ms-4 me-4">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-2">
                                <div class="col mb-6">
                                    <label for="name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col mb-6">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                        <input id="text" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col mb-6">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-12">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-6">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Age') }}</label>

                                    <div class="col-md-12">
                                        <input id="text" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">

                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Country') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="name" class="col-form-label text-md-end">{{ __('State') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col ">
                                    <label for="name" class="col-form-label text-md-end">{{ __('City') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-4">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-6">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Role') }}</label>

                                    <div class="col-md-12">
                                        <select class="form-select" name="role_id" value="{{ old('role') }}" required autocomplete="role" autofocus aria-label="Default select example">
                                            <option disabled>Select Your Role</option>
                                        @foreach ($data as $role)
                                            @if ($role->id == 1 || $role->id == 2)
                                                <option value="{{$role-> id}}">{{$role-> role_type}}</option>
                                            @endif    
                                        @endforeach
                                        </select>
                                        
                                        {{-- @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0" >
                                <div class="col-md-6 offset-md-5 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

