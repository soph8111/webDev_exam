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
        <div id="login_container">
            <h3>Login</h3>
            <form id="login_form" action="bridge-login" method="POST">
                <div class="input_group">
                    <label>Email</label>
                    <input type="email"
                    name="email"
                    placeholder="Email"
                    
                >
                </div>

                <div class="input_group">
                    <label>Password</label>
                    <input type="password"
                    name="password"
                    placeholder="Password"
                    >
                </div>
                <button>Login</button>
            </form>

            
    

        <p id="or">or</p>
        <h3>Sign up</h3>
            <p>Don't have an account?</p>
            <button id="signup_button" onclick="showSignup()">Sign up here</button>
            </div>

        <div id="signup_container">
        <h3>Sign up</h3>
            <form id="signup_form" onsubmit="validate(signup); return false">
                <div class="input_group">
                    <label>
                        <p>First name</p>
                        <p class="input_regex_info">(min <?=_USER_FIRST_NAME_MIN_LEN?> max <?=_USER_FIRST_NAME_MAX_LEN?> characters long)</p>
                    </label>

                    <input type="text"
                    name="user_first_name"
                    placeholder="First name"
                    data-validate="str"
                    data-min="<?=_USER_FIRST_NAME_MIN_LEN?>"
                    data-max="<?=_USER_FIRST_NAME_MAX_LEN?>"
                    >
                </div>

                <div class="input_group"> 
                    <label>
                        <p>Last name</p>
                        <p class="input_regex_info">(min <?=_USER_LAST_NAME_MIN_LEN?> max <?=_USER_LAST_NAME_MAX_LEN?> characters long)</p>
                    </label> 
                    <input type="text"
                    name="user_last_name"
                    placeholder="Last name"
                    data-validate="str"
                    data-min="<?=_USER_LAST_NAME_MIN_LEN?>"
                    data-max="<?=_USER_LAST_NAME_MAX_LEN?>"
                    >
                </div>

                <div class="input_group">
                    <div class="error_message">
                        <label>Email</label>
                        <p id="email_error_message" 
                        class="input_error_message" 
                        style="display: none">
                        ! Email already used</p>
                    </div>
                    <input type="email"
                    name="user_email"
                    placeholder="Email"
                    data-validate="email"
                    onblur="isEmailAvailable()"
                    >
                </div>

                <div class="input_group">
                    <label>
                        <p>Password</p>
                        <p class="input_regex_info">
                            (Min <?=_REGEX_PASSWORD_MIN_CHAR?> characters, 
                            at least <?=_REGEX_PASSWORD_MIN_LETTER?> letter 
                            and <?=_REGEX_PASSWORD_MIN_NUM?> number)</p>
                    </label>
                    <input type="password"
                    name="user_password"
                    placeholder="Password"
                    data-validate="regex"
                    data-regex= "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{<?=_REGEX_PASSWORD_MIN_CHAR?>,}$"
                    >
                </div>

                <div class="input_group">
                    <label><p>Confirm password</p></label>
                    <input type="password"
                    name="user_password_confirm"
                    placeholder="Confirm password"
                    data-validate="match"
                    data-match-name="user_password"
                    >
                </div> 
                <button>Signup</button>
            </form>
        </div>
    </div>

</main>

<script>
    async function signup() {
  // console.log("All input fileds validated correct");
  const theForm = document.querySelector("#signup_form");
  // console.log(theForm);
  const conn = await fetch("api-signup.php", {
    method: "POST",
    body: new FormData(theForm),
  });
  if (!conn.ok) {
    console.log("Uppss...");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
    });
    return;
  }
  // Success
  const user = await conn.json(); // Convert text to json
  console.log(user.user_first_name);
  Swal.fire({
    icon: "success",
    title: "Welcome " + user.user_first_name,
    text: "You are now signed up",
    confirmButtonText: '<a href="admin">Take me to the admin-page</a>',
  });
}

async function isEmailAvailable() {
  const form = event.target.form;
  const conn = await fetch("api-is-email-available.php", {
    method: "POST",
    body: new FormData(form),
  });
  if (!conn.ok) {
    document.querySelector("#email_error_message").style.display = "block";
    //document.querySelector("#bt_signup").style.pointerEvents = "none";
    return;
  }
  document.querySelector("#email_error_message").style.display = "none";
  //document.querySelector("#bt_signup").style.pointerEvents = "auto";
}
</script>

<?php
require_once __DIR__.'/comp_footer.php';
?>