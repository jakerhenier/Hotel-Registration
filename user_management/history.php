<!DOCTYPE html>
<meta charset = "eng">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>User activity history</title>
        <link rel="stylesheet" media = "all" href="../css/userHistory.css">
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a href = "reservations.php">
                    <div>
                        Reservations
                    </div>
                </a>
                <a id = "active">
                    <div>
                        History
                    </div>
                </a>
            </div>
            <div class = "userOptions">
                <span>Welcome, user.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "../../includes/action/logout.php">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class="logsContain">

            <div class = "logItem">
                <h4>September 5, 2018</h4>
                <p>Maria Leonora Teresa reserved Room 0002.</p>
            </div>

            <div class = "logItem">
                <h4>September 1, 2018</h4>
                <p>Maria Leonora Teresa checked out from Room 0009.</p>
            </div>

            <div class = "logItem">

            </div>

        </div>
    </body>
</html>