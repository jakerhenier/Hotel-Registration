<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" charset = "utf-8">
<html>
    <head>
        <title>Room Management</title>
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/roomManage.css" />
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a id = "active">
                    <div>
                        Rooms
                    </div>
                </a>
                <a href = "reservationManage.php">
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
        <div class = "underlay">
        </div>
        <div class = "tableContain">
            <div class = "toggles"> <!-- Dropdown for showing specific room type -->
                <span>Show room type</span>
                <select>
                    <option value = "standard">Standard</option>
                    <option value = "deluxe">Deluxe</option>
                    <option value = "joint">Joint</option>
                    <option value = "suite">Suite</option>
                    <option value = "apartment">Apartment style</option>
                </select>
            </div>
            <table id = "table">
                <tr>
                    <th>Room number</th>
                    <th>State</th>
                </tr>
                <!-- Use as basis for outputing data -->
                <tr>
                    <td>0001</td>
                    <td>Reserved</td>
                </tr>
                <tr>
                    <td>0002</td>
                    <td>Available</td>
                </tr>
                <tr>
                    <td>0003</td>
                    <td>Occupied</td>
                </tr>

                <!-- The room management popup -->

                <div class = "popupBoxContain">
                    <div class = "popupBox">
                        <h3>Room details</h3>
                        <p>Number: <span class = "roomNo">0002</span></p> <!-- Room number displayed here -->
                        <p>Type: <span class = "roomType">Standard</span></p> <!-- Room type displayed here -->
                        <p>Rate: ₱<span class = "roomRate">2,000</span></p> <!-- Room rate displayed here -->

                        <div class = "statusBox">
                            <label>
                                <input type = "radio" name = "status" value = "occupied">
                                <div>Occupied</div>
                            </label>
                            <label>
                                <input type = "radio" name = "status" value = "available">
                                <div>Available</div>
                            </label>
                        </div>
                    </div>
                </div>
            </table>
        </div>

        <script src = "scripts/jquery-3.3.1.min.js"></script>
        <script src = "scripts/roomManage.js"></script>
    </body>
</html>