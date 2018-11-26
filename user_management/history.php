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

$query = "SELECT * FROM histories WHERE guest_id = ? ORDER BY date_of_action DESC";
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
                <span>Welcome, <?php echo $guestData[0]['firstname']; ?>.</span> <!-- First name of the current user will be displayed after 'Welcome, ' -->
                <a href = "logout.php">logout</a> <!-- Destroy session and redirect to login page -->
            </div>
        </div>

        <div class = "underlay"></div>

        <div class="logsContain">
            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<div class = "logItem">
                                <h4>'.date('M j<\s\up>S</\s\up> Y', strtotime($row['date_of_action'])).'</h4>
                                <p>'.$row['action'].'.</p>
                            </div>';
                }
            }
            else {
                echo   '<div class = "logItem">
                            <p style="text-align: center;">You have no history.</p>
                        </div>';
            }
            ?>
        </div>
    </body>
</html>