<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')


<section class="showcase">
        <header>
            <div class="car_logo">
                <span><img class="carimg" src="{{ asset('images/icons8-car-64.png') }}"></span>
                <div class="logo_head">
                    <h3 class="logo">RENTAL SERVICES</h3>
                </div> 
            </div>
            <div class="toggle"></div>
        </header>
        <img class="main_img" src="{{ asset('images/pexels-alexandra-bakhareva-8563080.jpg') }}" muted loop autoplay></img>
        <div class="overlay"></div>

        <div class="sign_cont">
            <div class="headsign">
            <h1 class="rehe" >Login</h1>
              
            </div>
            <div class="sign_form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">{{ __('Login') }}</div> -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="text_signup">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div> -->
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="bottom">
                                    <button type="submit" class="btn btn-primary" style="padding: 5px 40px; margin-top:10px;">
                                        {{ __('Login') }}
                                    </button>
                                    
<!-- 
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif -->
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
