<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="mobile">
    <link rel="stylesheet" href="600">
    <link rel="stylesheet" href="900">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <a href="/"><img src="" alt="Momondo"></a>
        </div>
        <div>
            <a href="trips">Trips</a>
            <a id="login-button" onclick="toggleLoginPopup()">Sign in</a>
            <a href="danish">🇩🇰 Dansk</a>
        </div>
    </header>

    <div id="menu">
        <div id="burger_menu">
            <button onclick="toggleMenu()">☰</button>
        </div>
        <nav>
            <div id="signup">
                <a href="signup">Sign up</a>
                <a href="admin">Admin</a>
            </div>
            <div id="link">
                <a href="flights">Flights</a>
                <a href="stays">Stays</a>
                <a href="car_hire">Car hire</a>
                <a href="campers">Campers</a>
                <a href="things_to_do">Things to do</a>
                <a href="holidays">Holidays</a>
                <a href="trains_and_buses">Trains and Buses</a>
            </div>
            <div id="explore">
                <a href="explore">Explore</a>
            </div>
            <div id="trips">
                <a href="trips">Trips</a>
            </div>
        </nav>
    </div>