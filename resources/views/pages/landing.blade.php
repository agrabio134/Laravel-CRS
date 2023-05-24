<!-- resources/views/pages/cars/landing.blade.php -->
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
    <div class="text">
        <h2>Never Stop To </h2>
        <h3>Exploring The World</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
        @auth
        <a href="{{ route('cars') }}" class="btn btn-primary btn-lg">EXPLORE</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">LOGIN</a>
       
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">SIGN UP</a>
        @endauth





    </div>

    <ul class="social">
        <li><a href="#"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
        <li><a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
        <li><a href="#"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
    </ul>
</section>
<div class="menu">
    <ul>
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Destination</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</div>


@endsection