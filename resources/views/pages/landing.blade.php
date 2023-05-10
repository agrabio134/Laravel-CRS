<!-- resources/views/pages/cars/landing.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Never Stop</h1>
        <p>Exploring the world.</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">EXPLORE</a>
        <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg">LOGIN</a>

        <a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg">SIGN UP</a>



    </div>
@endsection
