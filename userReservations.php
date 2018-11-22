<!DOCTYPE html>
<meta charset = "eng">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title></title>
        <link rel="stylesheet" media = "all" href="css/userReservations.css">
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a id = "active">
                    <div>
                        Reservations
                    </div>
                </a>
                <a href = "">
                    <div>
                        History
                    </div>
                </a>
            </div>
            <div class = "userOptions">
                <span>Welcome, user.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "../includes/action/logout.php">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class="dataContain">
            <h3>Current Reservations</h3>

            <!-- H6 will display when client has no current reservations -->
            <div class = "emptyNotif">
                <p>It's empty in here. Reserve a room <a href = "reservation.php">here</a></p>
            </div>
        </div>
    </body>
</html>