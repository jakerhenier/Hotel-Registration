<?php 
session_start();
require_once('../includes/config/db.php');
require_once('function/functions.php');

$guestData = '';
if (!isset($_SESSION['guest_session'])) {
    header('location: login.php');
}
else {
    $guestData = $_SESSION['guest_session'];
}

$query = "SELECT * FROM reservations WHERE guest_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $guestData[0]['guest_id']);
$stmt->execute();
$result = $stmt->get_result();

$check_in = '1970-01-01';
$check_out = '1970-01-01';
$noofadults = '1';
$noofkids = '0';
$roomno = '0';

if (isset($_GET['edit'])) {
    $roomno = $_GET['edit'];

    $query = "SELECT * FROM reservations WHERE roomno = ? AND guest_id = {$guestData[0]['guest_id']}";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $roomno);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $check_in = date('Y-m-d', strtotime($row['check_in']));
            $check_out = date('Y-m-d', strtotime($row['check_out']));
            $noofadults = $row['noofadults'];
            $noofkids = $row['noofkids'];
        }
    }
    else {
        $_SESSION['error_msg'] = "User has no reservation in that room.";
        header('location: reservations.php');
    }
}

if (isset($_GET['cancel'])) {
    $roomno = $_GET['cancel'];

    $query = "SELECT * FROM reservations WHERE roomno = ? AND guest_id = {$guestData[0]['guest_id']}";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $roomno);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (!($result->num_rows > 0)) {
        $_SESSION['error_msg'] = "User has no reservation in that room.";
        header('location: reservations.php');
    }
}
?>
<!DOCTYPE html>
<meta charset = "eng">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Manage your reservations</title>
        <link rel="stylesheet" media = "all" href="../css/userReservations.css">
        <script src="../scripts/jquery.js"></script>
    </head>
    <body>
        <div class = "top">
            <div id = "menuItems">
                <a id = "active">
                    <div>
                        Reservations
                    </div>
                </a>
                <a href = "history.php">
                    <div>
                        History
                    </div>
                </a>
            </div>
            <div class = "userOptions">
                <span>Welcome, <?php echo $guestData[0]['firstname']?>.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "logout.php">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class="dataContain">
            <h3>Current Reservations</h3>
            <?php 
            if (isset($_SESSION['success_msg'])) {
                echo '<h4 style="color: green; text-align: center;">'.$_SESSION['success_msg'].'</h4>';
                unset($_SESSION['success_msg']);
            }
            ?>
            <?php 
            if (isset($_SESSION['error_msg'])) {
                echo '<h4 style="color: red; text-align: center;">'.$_SESSION['error_msg'].'</h4>';
                unset($_SESSION['error_msg']);
            }
            ?>
            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<table>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Room '.$row['roomno'].'</td>
                                    '.(((checkIfOccupied($conn, $row['roomno'], $guestData[0]['guest_id'])) == 'Reserved') 
                                    ?   '<td>
                                            <a href="?edit='.$row['roomno'].'">Edit</a>
                                            <a href="?cancel='.$row['roomno'].'">Cancel</a>
                                        </td>'
                                    :   '<td style="text-align: center;">
                                            Room occupied and uneditable.
                                        </td>').
                                    '
                                </tr>
                            </table>';
                }
            }
            else {
                echo   '<div class = "emptyNotif">
                            <p>It\'s empty in here. Reserve a room <a href = "reserve.php">here</a>.</p>
                        </div>';
            }
            ?>
        </div>

        <!-- Popup for editing reservation details -->
        <!-- Parehaa lang atong sa room management War -->
        <!-- Use 'grid' instead of 'block' for display property -->
        <div class="popupBoxContain">
                <div class="popupBox">
                    <h3>Edit reservation details</h3>

                    <form action="../includes/action/update_reservation_guest.php" method="POST">
                        <div class="inputBoxes">
                            <div>
                                <p>Check-in date</p>
                                <input type="date" name="check_in" value="<?php echo $check_in; ?>" id="check_in" required>
                            </div>
                            <div>
                                <p>Check-out date</p>
                                <input type="date" name="check_out" value="<?php echo $check_out; ?>" id="check_out" required>
                            </div>
                        </div>

                        <div class="inputBoxes">
                            <div>
                                <p>Number of adults</p>
                                <input type="number" min = "1" max = "4" name="noofadults" value="<?php echo $noofadults ?>" id="noofadults" required>
                            </div>
                            <div>
                                <p>Number of children</p>
                                <input type="number" min = "0" max = "4" name="noofkids" value="<?php echo $noofkids ?>" id="noofkids" required>
                            </div>
                        </div>

                        <div class="inputBoxes input-button">
                            <div>
                                <button id = "confirm" value="<?php echo $roomno; ?>" name="confirm">Confirm</button>
                            </div>
                            <div>
                                <button id = "close" name="close">Close</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="confirmDel">
                <div class="dialog">
                    <p>Confirm cancellation?</p>
                    <form action="../includes/action/cancel_reservation.php" method="POST">
                        <div class="inputBoxes choices">
                            <div>
                                <button id="yes" value="<?php echo $roomno; ?>" name="yes">Yes</button>
                            </div>
                            <div>
                                <button id="no" name="no">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </body>
    <?php 
    if (isset($_GET['edit'])) {
        echo   '<script>
                    $(".popupBoxContain").css("display", "grid");
                </script>';
    }
    ?>
    <?php
    if (isset($_GET['cancel'])) {
        echo   '<script>
                    $(".confirmDel").css("display", "grid");
                </script>';
    }
    ?>
</html>