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
                        <h3 class = "h3 h3--room">Room details</h3>
                        <p>Number:&emsp;<span class = "roomDetails roomNo">0002</span></p> <!-- Room number displayed here -->
                        <p>Type:&emsp;<span class = "roomDetails roomType">Standard</span></p> <!-- Room type displayed here -->
                        <p>Rate:&emsp;₱<span class = "roomDetails roomRate">2,000</span></p> <!-- Room rate displayed here -->

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

                        <h3 class = "h3 h3--client">Client details</h3>
                        <div class = "formContain">
                            <form action="">
                                <div class = "inputBox">
                                    <p>Last name</p>
                                    <input type = "text" name = "lastName" required>
                                </div>
                                <div class = "inputBox">
                                    <p>First name</p>
                                    <input type = "text" name = "lastName" required>
                                </div>
                                <div class = "inputBox">
                                    <p>Contact number</p>
                                    <input type = "text" name = "lastName" required>
                                </div>
                                <div class = "inputBox" id = "numContain">
                                    <div class = "numInput">
                                        <p>Number of adults</p>
                                        <input type = "number" name = "noofadults" min = "1" max = "4" value = "1"> <!-- Field for no of adults -->
                                    </div>
                                    <div class = "numInput">
                                        <p>Number of children</p>
                                        <input type = "number" name = "noofkids" min = "0" max = "4" value="0"> <!-- Field for no of kids -->
                                    </div>
                                </div>
                                <!-- This div will only appear if the room is booked, otherwise not displayed -->
                                <div class = "paymentDetails">
                                    <h3 class = "h3 h3--payment">Payment details</h3>
                                    <p>Room payment:&emsp;₱<span class = "payments"></span></p>
                                    <p>Adult clients:&emsp;₱<span class = "payments"></span></p>
                                    <p>Child clients:&emsp;₱<span class = "payments"></span></p>
                                    <p>Total payment:&emsp;₱<span class = "payments"></span></p>
                                </div>
                                <div class = "inputBox"> <!-- Button for submit and cancel -->
                                    <div class = "buttonBox">
                                        <input type = "submit" name="reserve" value="Confirm" />
                                    </div>
                                    <div class = "buttonBox">
                                        <a href = "#" id = "collapse" onclick = "closePopUp();">
                                            <div id = "cancelButton">
                                                <p>Close</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </table>
        </div>

        <script src = "scripts/jquery-3.3.1.min.js"></script>
        <script>
            function closePopUp() {
                document.getElementById("popupBoxContain").style.display = "none";
            }
        </script>
    </body>
</html>