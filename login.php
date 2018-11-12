<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Staff Login</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/login.css" />
    </head>
    <body>
        <div id = "darkOverlay">
        </div>
        <div class = "loginBox">
            <p>Enter your credentials</p>
            <form>
                <div class = "inputBox">
                    <p>Username</p>
                    <input type = "text" name = "username" required/>
                </div>
                <div class = "inputBox">
                    <p>Password</p>
                    <input type = "password" name = "password" required/>
                </div>
                <div class = "inputBox">
                    <button type = "submit">Login</button>
                </div>
                <div class = "inputBox">
                    <a href = "index.php">Return to homepage</a>
                </div>
            </form>
        </div>
    </body>
</html>