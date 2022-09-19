<?php
require_once __DIR__.'/comp_header.php';
require_once __DIR__.'/_x.php';
?>

<main id="index">

    <h1>Welcome! Find a flexible flight for your next trip.</h1>

    <div id="flight_search">
        <form>
            <div id="search_container">
                <div id="from_container">
                    <input id="from_input" name="from_city_name" type="text" placeholder="From?" 
                    oninput="showFromResults()">
                    <div id="from_results"></div>
                </div>
                <div id="to_container">
                    <input id="to_input" name="to_city_name" type="text" placeholder="To?" 
                    oninput="showToResults()">
                    <div id="to_results"></div>
                </div>
            </div>
            <button id="search" onclick="showFlightResults(); return false">Search</button>
        </form>
    </div>

    <div id="main">
        <div id="left"> 
            left
        </div>
        <div id="right">
            <h2 id="title_of_flight_search"></h2>
            <div id="flight_search_results"></div>
        </div>
    </div>

    <div class="login_overlay" onclick="toggleLoginPopup()"></div>
    <div id="login_popup">
        <button class="close_button" onclick="toggleLoginPopup()">╳</button>
        <div id="login">
            <h3>Login</h3>
            <form id="login_form" action="bridge-login" method="POST">
                <div class="input_group">
                    <label>Email</label>
                    <input type="email"
                    name="user_email"
                    placeholder="Email"
                    data-validate="email"
                >
                </div>

                <div class="input_group">
                    <label>Password</label>
                    <input type="password"
                    name="user_password"
                    placeholder="Password"
                    data-validate="str"
                    >
                </div>
                <button>Login</button>
            </form>
        </div>

        <p id="or">or</p>

        <div id="signup">
            <h3>Sign up</h3>
            <p>Don't have an account?</p>
            <button id="signup_button"><a href="signup">Sign up here</a> </button>
        </div>
    </div>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>