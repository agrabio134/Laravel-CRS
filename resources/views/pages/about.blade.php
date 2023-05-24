<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="icon" href="{{ asset('images/icons8-car-64.png') }}">
    <!-- <link rel="stylesheet" href="/Style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Car Rental System</title>
</head>

<style>
    
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

@if(auth()->check())


<body>
    <header>
        <div class="car_logo">
            <span><img src="{{ asset('images/icons8-car-64.png') }}"></span>
            <div class="logo_head">
                <h4 class="logo">CAR</h4>
                <h3 class="logo">RENTAL SERVICES</h3>
            </div>
        </div>

        <section class="menu">
            <ul class="menu-list">
                <li><a href="{{ route('landing') }}">Home</a> </li>
                <li><a href="{{ route('cars') }}">Cars</a></li>
                <li class="active">About Us</li>
                <li class="welcome">Welcome, {{ auth()->user()->name }}</li>
            <li>
                <form id="logout-form" class="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            </ul>

            <button>
                <i class="fas fa-times"></i>
                <i class="fas fa-bars"></i>
            </button>
        </section>
    </header>
    <section class="main">
        <section class="right">
            <img  src="{{ asset('images/images/img.svg') }}" alt="Langing image">
        </section>
        <section class="left">
            <p class="about">ABOUT OUR COMPANY</p>
            <p class="title">Feel The Difference And Relaxation with Car Rental Services!</p>
            <p class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nihil rerum itaque quisquam!
                Natus repudiandae nesciunt tempora odio amet. Saepe?</p>
            <div class="dev_button">
                <div class="harvey">
                    <img src="{{ asset('images/harvey.jpg') }}" class="cta"></img>
                    <div class="devs_title">
                        <h4 class="developers">Backend - Dev</h4>
                        <p>John Harvey Teoxon Agrabio</p>
                    </div>
                </div>
                <div class="rodri">
                    <img src="{{ asset('images/rodri.jpg') }}" class="cta"></img>
                    <div class="Rod_title">
                        <h4 class="developers">Frontend - Dev</h4>
                        <p>Rodri Libron Gabales</p>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <div class="second">
        <div class="sLeft">
            <p class="questions">Have Any Questions?</p>
            <p class="msg1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nihil rerum itaque quisquam!
                Natus repudiandae nesciunt tempora odio amet. Saepe?</p>
            <div class="icons">
                <div class="icon_img">
                    <img class="img_i" src="{{ asset('images/phone.png') }}">
                    <p class="itext"> 755 302 1234</p>
                </div>
                <div class="icon_img">
                    <img class="img_i" src="{{ asset('images/locations.png') }}">
                    <p class="itext"> Olongapo City</p>
                </div>
                <div class="icon_img">
                    <img class="img_i" src="{{ asset('images/email.png') }}">
                    <p class="itext"> support@email.com</p>
                </div>

            </div>
        </div>
        <div class="rLeft">
        <form action="{{ route('contact') }}" method="POST">
        @csrf

                <div class="container">
                    <h1 class="questions">Contact With Us!</h1>
                    <div class="rows">
                        <div class="row1">
                            <input type="text" placeholder="First Name" name="Fname" id="Fname" required>
                            <input type="text" placeholder="Last Name" name="Lname" id="Lname" required>
                        </div>
                        <div class="row1">
                            <input type="text" placeholder="Email" name="email" id="email" required>
                            <input type="number" placeholder="Phone Number" name="number" id="number" maxlength="11" required>
                        </div>
                        <textarea placeholder="Message" id="message" name="message"></textarea>
                    </div>
                    <button class="submitbutton" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
    @else
<script>
    alert("Please log in to access this page.");
    window.location.href = '/login';
</script>
@endif
</body>
<script>
    var menu = document.querySelector('.menu');
    var menuBtn = document.querySelector('.menu button');
    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('opened')
    })
</script>

</html>