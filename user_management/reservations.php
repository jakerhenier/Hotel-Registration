<?php 
session_start();
require_once('../includes/config/db.php');

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

?>
<!DOCTYPE html>
<meta charset = "eng">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Manage your reservations</title>
        <link rel="stylesheet" media = "all" href="../css/userReservations.css">
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
                echo $_SESSION['success_msg'];
                unset($_SESSION['success_msg']);
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
                                    <td>
                                        <button value='.$row['roomno'].' id="edit" role = "button">Edit</button>
                                        <button value='.$row['roomno'].' id="cancel" role = "button">Cancel</button>
                                    </td>
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
                        <!-- <span>Room type</span>
                        <select id="room-select">
                            <option selected disabled>Select...</option>
                            <option value = "standard">Standard</option>
                            <option value = "deluxe">Deluxe</option>
                            <option value = "joint">Joint</option>
                            <option value = "suite">Suite</option>
                            <option value = "apartment">Apartment style</option>
                        </select>

                        <table>
                        </table> -->

                        <div class="inputBoxes">
                            <div>
                                <p>Check-in date</p>
                                <input type="date" name="check_in" id="check_in">
                            </div>
                            <div>
                                <p>Check-out date</p>
                                <input type="date" name="check_out" id="check_out">
                            </div>
                        </div>

                        <div class="inputBoxes">
                            <div>
                                <p>Number of adults</p>
                                <input type="number" min = "1" max = "4" name="noofadults" id="noofadults" required>
                            </div>
                            <div>
                                <p>Number of children</p>
                                <input type="number" min = "0" max = "4" name="noofkids" id="noofkids" required>
                            </div>
                        </div>

                        <div class="inputBoxes input-button">
                            <div>
                                <button id = "confirm" name="confirm">Confirm</button>
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
    <script src="../scripts/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#edit').on('click', function() {
                const roomno = $('#edit').val();
                $.ajax({
                    url: 'api/get_data.php',
                    method: 'POST',
                    data: {
                        roomno: roomno
                    },
                    dataType: 'text',
                    success: function(data) {
                        const d = JSON.parse(data);
                        
                        // Dates
                        const date1 = new Date(d[0].check_in);
                        const date2 = new Date(d[0].check_out);
                        const check_in = `${date1.getFullYear()}-${date1.getMonth() + 1}-${date1.getDate()}`
                        const check_out = `${date2.getFullYear()}-${date2.getMonth() + 1}-${date2.getDate()}`

                        $('#check_in').attr('value', check_in)
                        $('#check_out').attr('value', check_out)
                        $('#check_in').attr('min', check_in);
                        $('#check_out').attr('min', check_in);
                        $('#noofadults').attr('value', d[0].noofadults);
                        $('#noofkids').attr('value', d[0].noofkids);
                        $('#confirm').attr('value', d[0].roomno);
                        
                        $('.popupBoxContain').css('display', 'grid');
                    }
                })
            })

            $('#close').on('click', function() {
                $('.popupBoxContain').css('display', 'none');
            })
        })
    </script>
</html>