<?php 
require_once('../config/db.php');

$guest_id = '';
$firstname = '';
$lastname = '';

if(isset($_POST['checkout'])) {
    $roomno = mysqli_real_escape_string($conn, $_POST['roomno']);

    $query1 = "SELECT guest_id, firstname, lastname FROM reservations WHERE roomno = {$roomno}";
    $result = $conn->query($query1);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $guest_id = $row['guest_id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
        }

        $history = $firstname . " " . $lastname . " has checked out Room " . $roomno;

        $query2 = "UPDATE rooms set status = 'Available', guest_id = 0 WHERE roomno = {$roomno} AND guest_id = {$guest_id}";
        if ($conn->query($query2)) {
            $query3 = "INSERT INTO histories VALUES (DEFAULT, {$guest_id}, '{$history}', CURRENT_TIMESTAMP)";
            if ($conn->query($query3)) {
                $query4 = "DELETE FROM reservations WHERE guest_id = {$guest_id} AND roomno = {$roomno}";
                if ($conn->query($query4)) {
                    $_SESSION['success_msg'] = "Checkout Success!"; 
                    header('location: ../../management/index.php');
                }
                else {
                    echo "Error: " . $conn->error; 
                }
            }
            else {
                echo "Error: " . $conn->error; 
            }
        }
        else {
            echo "Error: " . $conn->error; 
        }
    }
    else {
        echo "Error: " . $conn->error; 
    }
}
else {
    header('location: ../../management/index.php');
}

?>