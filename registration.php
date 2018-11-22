<?php 
session_start();
?>
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
            <!-- <div class = "userNotify initial-reg">
                <p><img src="images/info.png" alt=""><span>Fill up all fields below.</span></p>
            </div> -->
            <?php 
                if (isset($_SESSION['reg_msg'])) {
                    echo   '<div class="userNotify user-exists">
                            <p><span><img src="images/error.png"></span>'.$_SESSION['reg_msg'].'</p>
                            </div>';
                    unset($_SESSION['reg_msg']);
                }
            ?>
            <!-- <div class = "userNotify user-exists">
                <p><img src="images/error.png" alt=""></p>
            </div> -->
            <form action="includes/action/register_guest.php" method="POST">
                <div class="inputBox">
                    <p>First name<span class = "required">*</span></p>
                    <input type="text" name="firstname" id="" required>
                </div>
                <div class="inputBox">
                    <p>Last name<span class = "required">*</span></p>
                    <input type="text" name="lastname" id="" required>
                </div>
                <div class="inputBox">
                    <p>Contact number (+63)<span class = "required">*</span></p>
                    <input type="text" name="contactno" id="" required>
                </div>
                <div class="inputBox">
                    <p>Username<span class = "required">*</span></p>
                    <input type="text" name="username" id="" required>
                </div>
                <div class="inputBox">
                    <p>Password<span class = "required">*</span></p>
                    <input type="password" name="password" id="" required>
                </div>
                <!--
                <div class="inputBox">
                    <p>Confirm password</p>
                    <input type="text" name="" id="" required>
                </div> -->
                <div class="inputBox">
                    <input type="submit" name="register" value="Register">
                </div>
                <div class="inputBox goBack">
                    <a href = "login.php">
                        Go back
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>