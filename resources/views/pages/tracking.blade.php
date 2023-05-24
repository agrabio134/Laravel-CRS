<!-- resources/views/tracking.blade.php -->

@extends('layouts.home')

@section('content')
<header>
    <nav>
        <div class="nav-logo">
            <span><img src="{{ asset('images/icons8-car-64.png') }}"></span>
            <div class="logo-head">
                <h4 class="logo">CAR</h4>
                <h3 class="logo">RENTAL SERVICES</h3>
            </div>
        </div>

        <ul class="menu-list">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li ><a href="{{ route('cars') }}">Cars</a></li>
            <li class="active">Tracking</li>
            <li><a href="{{ route('about') }}">About Us</a></li>
           

            <li class="welcome">Welcome, {{ auth()->user()->name }}</li>
            <li>
                <form id="logout-form" class="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>

        <button class="menu-toggle">
            <i class="fas fa-times"></i>
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>

<style>
    .tracking-heading {
        font-size: 2.5em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .tracking-subheading {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        color: #fff;
    }

    .no-rentals {
        font-size: 1.2em;
        color: red;
        margin-top: 20px;
    }

    .rentals-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .rentals-table th,
    .rentals-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .rentals-table th {
        font-weight: bold;
    }

    .rentals-table tbody tr:nth-child(even) {
        background-color: #6d8b92;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;

    }

    .nav-logo {
        display: flex;
        align-items: center;
    }

    .nav-logo img {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .menu-list {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .item_container{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .item {
        color: #fff;
    }


    .welcome {
        margin-left: 20px;
        font-weight: bold;
    }

    .logout-form {
        margin: 0;
    }

    .logout-form button {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 4px;
    }

    .logout-form button:hover {
        background-color: #d32f2f;
    }

    .menu-toggle {
        display: none;
        /* Add appropriate styles for your menu toggle button */
    }

    /* Modal styles */
    .modal {
        display: none;
        /* Hide the modal by default */
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        max-width: 600px;
        /* Adjust the maximum width of the modal content */
    }

    .modal-title {
        font-size: 20px;
        font-weight: bold;
    }

    .modal-body {
        /* Add custom styles for the modal body */
    }

    .modal-footer {
        /* Add custom styles for the modal footer */
    }

    .close {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #888;
        cursor: pointer;
    }

    /* Add appropriate styles for your responsive navigation menu */
    @media (max-width: 768px) {
        .menu-list {
            display: none;
        }

        .menu-toggle {
            display: block;
        }
    }
</style>

<div class="car_container">

    <div class="item_container">
        <div class="item">
            <h1 class="tracking-heading">Rental Tracking</h1>
        </div>
        <div class="item">
            <h2 class="tracking-subheading">Your Pending/Rented Cars</h2>
        </div>
    </div>
    @if ($rentals->isEmpty())
    <p class="no-rentals">No rentals found.</p>
    @else
    <table class="rentals-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
            <tr>
                <td>{{ $rental->id }}</td>
                <td>{{ $rental->car->make }} {{ $rental->car->model }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection