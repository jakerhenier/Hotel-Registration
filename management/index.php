<?php 
session_start();
require_once('../includes/config/db.php');

$userdata = '';

if (!isset($_SESSION['login_session'])) {
    header('location: login.php');
}
else {
    $userdata = $_SESSION['login_session'];
}
?>
<!DOCTYPE html>
<meta name="viewport" content="width = device-width, initial-scale = 1.0" charset="utf-8">
<html>

<head>
    <title>Room Management</title>
    <link rel="stylesheet" type="text/css" media="all" href="../css/roomManage.css" />
</head>

<body>
    <div class="top">
        <div id="menuItems">
            <a id="active">
                <div>
                    Rooms
                </div>
            </a>
            <a href="manage.php">
                <div>
                    Reservations
                </div>
            </a>
        </div>
        <div class="userOptions">
            <span>Welcome, <?php echo $userdata[0]['firstname']."." ?></span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
            <a href="../includes/action/logout.php">logout</a> <!-- Destroy session and redirect to login page -->
        </div>
    </div>
    <div class="underlay">
    </div>
    <div class="tableContain">
        <div class="toggles">
            <!-- Dropdown for showing specific room type -->
            <span>Show room type</span>
            <select id="room-select">
                <option value="all" selected>All</option>
                <option value="standard">Standard</option>
                <option value="deluxe">Deluxe</option>
                <option value="joint">Joint</option>
                <option value="suite">Suite</option>
                <option value="apartment">Apartment style</option>
            </select>
        </div>
        <table id="rooms">
            <tr type="checkbox">
                <th>Room number</th>
                <th>State</th>
            </tr>
            
            <!-- The room management popup -->

            <div id="popup" class="popupBoxContain">
                <div class="popupBox">
                    <h3 class="h3 h3--room">Room details</h3>
                    <p>Number:&emsp;<span class="roomDetails roomNo">0002</span></p>
                    <!-- Room number displayed here -->
                    <p>Type:&emsp;<span class="roomDetails roomType">Standard</span></p>
                    <!-- Room type displayed here -->
                    <p>Rate:&emsp;₱<span class="roomDetails roomRate">2,000</span></p>
                    <!-- Room rate displayed here -->

                    <div class="statusBox">
                        <label>
                            <input type="radio" name="status" value="occupied">
                            <div>Occupied</div>
                        </label>
                        <label>
                            <input type="radio" name="status" value="available">
                            <div>Available</div>
                        </label>
                    </div>

                    <h3 class="h3 h3--client">Client details</h3>
                    <div class="formContain">
                        <form action="">
                            <div class="inputBox">
                                <p>Last name</p>
                                <input type="text" name="lastName" required>
                            </div>
                            <div class="inputBox">
                                <p>First name</p>
                                <input type="text" name="lastName" required>
                            </div>
                            <div class="inputBox">
                                <p>Contact number</p>
                                <input type="text" name="lastName" required>
                            </div>
                            <div class="inputBox" id="numContain">
                                <div class="numInput">
                                    <p>Number of adults</p>
                                    <input type="number" name="noofadults" min="1" max="4" value="1">
                                    <!-- Field for no of adults -->
                                </div>
                                <div class="numInput">
                                    <p>Number of children</p>
                                    <input type="number" name="noofkids" min="0" max="4" value="0">
                                    <!-- Field for no of kids -->
                                </div>
                            </div>
                            <!-- This div will only appear if the room is booked, otherwise not displayed -->
                            <div class="paymentDetails">
                                <h3 class="h3 h3--payment">Payment details</h3>
                                <p>Room payment:&emsp;₱<span class="payments"></span></p>
                                <p>Adult clients:&emsp;₱<span class="payments"></span></p>
                                <p>Child clients:&emsp;₱<span class="payments"></span></p>
                                <p>Total payment:&emsp;₱<span class="payments"></span></p>
                            </div>
                            <div class="inputBox">
                                <!-- Button for submit and cancel -->
                                <div class="buttonBox">
                                    <input type="submit" name="reserve" value="Confirm" />
                                </div>
                                <div class="buttonBox">
                                    <a href="#" id="collapse">
                                        <div id="cancelButton">
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

    <script src="../scripts/jquery.js"></script>
    <script>
        $(document).ready(function() {
            var optionSelected = $("option:selected", this);
            var roomSelect = optionSelected.val();
            $.ajax({
                    method: 'POST',
                    url: '../includes/api/load-specific-rooms.php',
                    data: {
                        roomSelect: roomSelect
                    },
                    dataType: 'text',
                    success: function (data) {
                        $('#rooms').html(data);
                    } 
                });
            })
    </script>
    <script>
        $(document).ready(function () {
            $('#room-select').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var roomSelect = optionSelected.val();
                console.log(roomSelect);
                $.ajax({
                    method: 'POST',
                    url: '../includes/api/load-specific-rooms.php',
                    data: {
                        roomSelect: roomSelect
                    },
                    dataType: 'text',
                    success: function (data) {
                        $('#rooms').html(data);
                    } 
                });
            });
        })
    </script>
    <script>
        $(document).on('click', '#rooms tr', function(e) {
            var id = this.id;
            $('.popupBoxContain').css('display', 'block');
        })

        $(document).on('click', '#collapse', function(e) {
            $('.popupBoxContain').css('display', 'none');
        })
    </script>
</body>

</html>