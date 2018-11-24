<?php 
session_start();
?>
<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Guest Login</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "../css/login.css" />
    </head>
    <body>
        <div id = "darkOverlay">
        </div>
        <div class = "loginBox">
            <p>Enter your credentials</p>
            <?php 
                if (isset($_SESSION['login_msg'])) {
                    echo   '<div class="userNotify incorrect-creds">
                            <p><span><img src="../images/error.png"></span>'.$_SESSION['login_msg'].'</p>
                            </div>';
                    unset($_SESSION['login_msg']);
                }
            ?>
            <?php 
                if (isset($_SESSION['reg_msg'])) {
                    echo   '<div class="userNotify regisSuccess">
                            <p><span><img src="../images/success.png"></span>'.$_SESSION['reg_msg'].'</p>
                            </div>';
                    unset($_SESSION['reg_msg']);
                }
            ?>

            <!-- <div class="userNotify regisSuccess">
                <p><img src="images/success.png" alt=""><span>Registration successful!</span></p>
            </div> -->

            <form action="../includes/action/login_guest.php" method="POST">
                <div class = "inputBox">
                    <p>Username</p>
                    <input type = "text" name = "username" required/>
                </div>
                <div class = "inputBox">
                    <p>Password</p>
                    <input type = "password" name = "password" required/>
                </div>
                <div class = "inputBox">
                    <input type = "submit" name="login" value="Login" />
                </div>
                <div class = "inputBox notRegis">
                    <a href = "registration.php">Not registered yet? Click here.</a>
                </div>
                <div class = "inputBox">
                    <a href = "index.php">Return to homepage</a>
                </div>
            </form>
        </div>
    </body>
</html>