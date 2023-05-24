@extends('layouts.home')

@section('content')
@if(auth()->check())
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
            <li class="active">Cars</li>
            <li><a href="{{ route('tracking') }}">Tracking</a></li>

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
    /* header {
        background-color: #f8f8f8;
        padding: 20px;
    } */

    .form-group {
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="date"] {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 4px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
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


@if ($cars->count() > 0)

<div class="car_container">
    @foreach ($cars as $car)
    <div class="card_cont">
        <img src="{{ $car->thumbnail }}">
        <b class="car_name">{{ $car->make }} {{ $car->model }}</b>
        <div class="money">
            <b>₱ {{ $car->daily_rate }} / Per Day</b>
        </div>
        <p class="desc_car">{{ $car->description }}</p>
        <div class="read_more">
            <a href="#" class="view-modal" data-car="{{ $car }}"  data-car-id="{{ $car->id }}">VIEW</a>
        </div>
    </div>
    @endforeach

</div>
@else
<p>No cars found.</p>
@endif
@else
<script>
    alert("Please log in to access this page.");
    window.location.href = '/login';
</script>
@endif




<!-- Invoice Modals -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 class="modal-title">Car Details</h2>
        <div class="modal-body">
     
        <div class="modal-footer">
            <!-- Add any buttons or additional content for the modal footer here -->
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Open modal when clicking on "VIEW" link
        $('.view-modal').click(function(e) {
            e.preventDefault();
            var car = $(this).data('car');
            populateModal(car);
            $('#modal').css('display', 'block');
        });

        // Close modal when clicking on close button or outside the modal
        $('.close, .modal').click(function(e) {
            if ($(e.target).hasClass('modal') || $(e.target).hasClass('close')) {
                $('#modal').css('display', 'none');
            }
        });

        // Function to populate the modal with car details
      // Function to populate the modal with car details and rental form
function populateModal(car) {
    // Replace the content inside the modal with the car details
    $('.modal-title').text(car.make + ' ' + car.model);
    // get car id

    // Clear the modal body
    $('.modal-body').empty();

    // Add the car details to the modal body
    $('.modal-body').append('<p>Car ID: ' + car.id + '</p>');
    let car_id = car.id;
    console.log(car_id);

    $('.modal-body').append('<p>Car description: ' + car.description + '</p>');
    $('.modal-body').append('<p><img src="' + car.thumbnail + '" width="100"></p>');
    $('.modal-body').append('<p>Car daily rate: ' + car.daily_rate + '</p>');

    // Add the rental form to the modal body
    $('.modal-body').append(`
    <form id="rental-form" action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" id="car_id" value="${car.id}">
           
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>
            <div class="form-group">
                <button type="submit">Rent Car</button>
            </div>
        </form>
    `);

    var today = new Date().toISOString().split('T')[0];
    $('#start_date').attr('min', today);

    // Disable past dates for the end_date input
    $('#end_date').attr('min', today);
    // Add any additional content to the modal footer
    $('.modal-footer').empty();
}


    });
</script>
@endsection