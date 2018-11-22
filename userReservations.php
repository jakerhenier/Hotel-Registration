<!DOCTYPE html>
<meta charset = "eng">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Manage your reservations</title>
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
                <a href = "userHistory.php">
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

            <!-- This div will display when client has no current reservations -->
            <div class = "emptyNotif">
                <p>It's empty in here. Reserve a room <a href = "reservation.php">here</a>.</p>
            </div>

            <!-- Otherwise, this table will -->
            <table>
                <tr>
                    <td>Room 0001</td>
                    <td>
                        <button name = "edit" role = "button">Edit</button>
                        <button name = "cancel" role = "button">Cancel</button>
                    </td>
                </tr>
            </table>

        </div>

        <!-- Popup for editing reservation details -->
        <!-- Parehaa lang atong sa room management War -->
        <!-- Use 'grid' instead of 'block' for display property -->
        <div class="popupBoxContain">
                <div class="popupBox">
                    <h3>Edit reservation details</h3>

                    <form action="" method="post">
                        <span>Room type</span>
                        <select id="room-select">
                            <option selected disabled>Select...</option>
                            <option value = "standard">Standard</option>
                            <option value = "deluxe">Deluxe</option>
                            <option value = "joint">Joint</option>
                            <option value = "suite">Suite</option>
                            <option value = "apartment">Apartment style</option>
                        </select>

                        <table>
                            <!-- Icopy paste nalang tong codes sa laing page War =) -->
                        </table>

                        <div class="inputBoxes">
                            <div>
                                <p>Check-in date</p>
                                <input type="date" name="" id="" required>
                            </div>
                            <div>
                                <p>Check-out date</p>
                                <input type="date" name="" id="" required>
                            </div>
                        </div>

                        <div class="inputBoxes">
                            <div>
                                <p>Number of adults</p>
                                <input type="number" name="" min = "1" max = "4" id="" value = "1" required>
                            </div>
                            <div>
                                <p>Number of children</p>
                                <input type="number" name="" min = "0" max = "4" id="" required>
                            </div>
                        </div>

                        <div class="inputBoxes input-button">
                            <div>
                                <button id = "confirm">Confirm</button>
                            </div>
                            <div>
                                <button id = "cancel">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="confirmDel">
                <div class="dialog">
                    <p>Confirm cancellation?</p>
                    <div class="inputBoxes choices">
                        <div>
                            <button>Yes</button>
                        </div>
                        <div>
                            <button>No</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>