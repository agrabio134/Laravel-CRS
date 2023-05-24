<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')

<section class="showcase">
        <header>
            <div class="car_logo">
                <span><img class="carimg" src="{{ asset('images/icons8-car-64.png') }}"></span>
                <div class="logo_head">
                    <h4 class="logo">CAR</h4>
                    <h3 class="logo">RENTAL SERVICES</h3>
                </div> 
            </div>
            <div class="toggle"></div>
        </header>
        <img class="main_img" src="{{ asset('images/pexels-alexandra-bakhareva-8563080.jpg') }}" muted loop autoplay></img>
        <div class="overlay"></div>

        <div class="sign_cont">
            <div class="headsign">
                <p class="rehe">REGISTER</p>
                <p class="pahe">Register Fill In This Form To Create An Account.</p>
              
            </div>
            <div class="sign_form">
        <!-- <div  class="text_signup">{{ __('Register') }}</div> -->

        <div class="card-body">
            <form method="POST" action="{{ route('register.post') }}" class="formsign">
                @csrf

                <div class="form-group row">
                    <label for="name"  class="text_signup" >{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"  class="text_signup">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="text_signup">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="text_signup">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                <div class="bottom">
                        <button type="submit" class="registerbtn">
                            {{ __('Register') }}
                        </button>
                        </div>
                        <div class="signin_submit">
                            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
