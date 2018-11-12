<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Reservations</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/reservationManage.css" />
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a href = "roomManage.php">
                    <div>
                        Rooms
                    </div>
                </a>
                <a id = "active">
                    <div>
                        Reservations
                    </div>
                </a>
            </div>
            <div class = "userOptions">
                <span>Welcome, user.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "" onclick = "">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class = "tableContain">
            <table>
                <tr>
                    <th>Room number</th>
                    <th>Room type</th>
                    <th>Guest name</th>
                </tr>
                <!-- Use as basis for outputting reservation data -->
                <tr>
                    <td>0001</td>
                    <td>Standard</td>
                    <td>TAYLOR, Lincoln</td>
                    <td><button type = "submit">Confirm</button></td> <!-- Button is important and will be used for confirming reservations -->
                </tr>
                <tr>
                    <td>0005</td>
                    <td>Suite</td>
                    <td>SCOTT, Glenn</td>
                    <td><button type = "submit">Confirm</button></td>
                </tr>
                <tr>
                    <td>0007</td>
                    <td>Standard</td>
                    <td>PRATT, Nicholas</td>
                    <td><button type = "submit">Confirm</button></td>
                </tr>
            </table>
        </div>
    </body>
</html>