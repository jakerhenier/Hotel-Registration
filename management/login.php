<?php 
session_start();
if (isset($_SESSION['login_session'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Staff Login</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "../css/login.css" />
    </head>
    <body>
        <div id = "darkOverlay">
        </div>
        <div class = "loginBox">
            <p>Login</p>

            <div class = "userNotify initial">
                <p><img src="../images/info.png" alt=""><span>Enter your credentials.</span></p>
            </div>
            <div class = "userNotify incorrect-creds">
                <p><img src="../images/error.png" alt=""><span>Incorrect credentials entered.</span></p> <!--Must appear when entered credentials are incorrect -->
            </div>

            <form action="../includes/action/login.php" method="POST">
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
                <div class = "inputBox">
                    <a href = "../index.php">Return to homepage</a>
                </div>
            </form>
        </div>
    </body>
</html>