<div class="login_overlay" onclick="toggleLoginPopup()"></div>
    <div id="login_popup">
        <button class="close_button" onclick="toggleLoginPopup()">╳</button>
        <div id="login_container">
            <h3>Login</h3>
            <form id="login_form" action="bridge-login" method="POST">
                <div class="input_group">
                    <label>Email</label>
                    <input type="email"
                    name="login_email"
                    placeholder="Email"  
                >
                </div>

                <div class="input_group">
                    <label>Password</label>
                    <input type="password"
                    name="login_password"
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