<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Register for an account</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/registration.css" />
    </head>
    <body>
        <div id = "darkOverlay">
        </div>
        <div class="loginBox">
            <p>Enter your information</p>
            <div class = "userNotify initial-reg">
                <p><img src="images/info.png" alt=""><span>Fill up all fields below.</span></p>
            </div>
            <div class = "userNotify user-exists">
                <p><img src="images/error.png" alt="">This client already exists.</p> <!-- This should appear when information entered already exists -->
            </div>
            <form action="" method="">
                <div class="inputBox">
                    <p>First name<span class = "required">*</span></p>
                    <input type="text" name="" id="" required>
                </div>
                <div class="inputBox">
                    <p>Last name<span class = "required">*</span></p>
                    <input type="text" name="" id="" required>
                </div>
                <div class="inputBox">
                    <p>Contact number (+63)<span class = "required">*</span></p>
                    <input type="text" name="" id="" required>
                </div>
                <div class="inputBox">
                    <p>Username<span class = "required">*</span></p>
                    <input type="text" name="" id="" required>
                </div>
                <div class="inputBox">
                    <p>Password<span class = "required">*</span></p>
                    <input type="password" name="" id="" required>
                </div>
                <!--
                <div class="inputBox">
                    <p>Confirm password</p>
                    <input type="text" name="" id="" required>
                </div> -->
                <div class="inputBox">
                    <input type="submit" name="register" value = "Register">
                </div>
                <div class="inputBox goBack">
                    <a href = "login_client.php">
                        Go back
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>