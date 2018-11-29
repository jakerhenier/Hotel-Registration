<?php 
session_start();
require_once('../includes/config/db.php');

$userdata = '';

$roomno = '';
$roomtype = '';
$roomrate = '';
$total = '';
$lastname = '';
$firstname = '';
$contactno = '';

if (!isset($_SESSION['admin_session'])) {
    header('location: login.php');
}
else {
    $userdata = $_SESSION['admin_session'];
}

$query = "SELECT * FROM rooms ORDER BY status DESC";
$result = $conn->query($query);

if (isset($_GET['view'])) {
    $roomno = $_GET['view'];
    $guest_id = $_GET['id'];

    $query = "SELECT * FROM rooms INNER JOIN reservations ON rooms.guest_id = reservations.guest_id WHERE rooms.roomno = {$roomno} AND reservations.guest_id = {$guest_id}";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomtype = $row['roomType'];
            $roomrate = $row['rate'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $contactno = $row['contactno'];
            $total = $roomrate * $row['days_duration'];
        }
    }
    else {
        header('location: index.php');
    }
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
        <table>
            <tr>
                <th>Room number</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            <?php 
            while ($row = $result->fetch_assoc()) {
                echo   '<tr>
                            <td>'.$row['roomNo'].'</td>
                            <td>'.$row['status'].'</td>
                            '.(($row['status'] == 'Occupied')
                            ?   '<td>
                                    <a href="?view='.$row['roomNo'].'&id='.$row['guest_id'].'">Checkout</a>
                                </td>'
                            :   '<td>
                                </td>').
                            '
                        </tr>';
            }
            ?>
            
            <!-- The room management popup -->

            <div class="popupBoxContain">
                <div class="popupBox">
                    <h3 class="h3 h3--room">Room details</h3>
                    <p>Number:&emsp;<span class="roomDetails roomNo"><?php echo $roomno; ?></span></p>
                    <!-- Room number displayed here -->
                    <p>Type:&emsp;<span class="roomDetails roomType"><?php echo $roomtype; ?></span></p>
                    <!-- Room type displayed here -->
                    <p>Rate:&emsp;₱ <span class="roomDetails roomRate"><?php echo $roomrate; ?></span></p>
                    <!-- Room rate displayed here -->

                    <h3 class="h3 h3--client">Client details</h3>
                    <div class="formContain">
                        <form action="../includes/action/checkout.php" method="POST">
                            <div class="inputBox">
                                <p>Last name</p>
                                <input type="text" value="<?php echo $lastname; ?>" name="lastname" disabled required>
                            </div>
                            <div class="inputBox">
                                <p>First name</p>
                                <input type="text" value="<?php echo $firstname; ?>"  name="firstname" disabled required>
                            </div>
                            <div class="inputBox">
                                <p>Contact number</p>
                                <input type="text" value="<?php echo $contactno; ?>"  name="contactno" disabled required>
                            </div>
                            <!-- This div will only appear if the room is booked, otherwise not displayed -->
                            <div class="paymentDetails">
                                <h3 class="h3 h3--payment">Payment details</h3>
                                <p>Room payment:&emsp;₱ <span class="payments"><?php echo $roomrate; ?></span></p>
                                <p>Total payment:&emsp;₱ <span class="payments"><?php echo $total; ?></span></p>
                            </div>
                            <input type="text" name="roomno" value="<?php echo $roomno; ?>" hidden>
                            <input type="text" name="guest_id" value="<?php echo $guest_id; ?>" hidden>
                            <div class="inputBox">
                                <!-- Button for submit and cancel -->
                                <div class="buttonBox">
                                    <input type="submit" name="checkout" value="Confirm" />
                                </div>
                                <div class="buttonBox">
                                    <a href="index.php">
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
    <?php 
    if (isset($_GET['view'])) {
        echo   '<script>
                    $(".popupBoxContain").css("display", "block");
                </script>';
    }
    ?>
</body>
</html>