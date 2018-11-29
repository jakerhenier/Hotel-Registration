<?php 
require_once('../config/db.php');

$guest_id = '';
$firstname = '';
$lastname = '';

if(isset($_POST['roomNo'])) {
    if($_POST['roomNo'] == "") {
        echo '';
    }
    else {
        $roomno = mysqli_real_escape_string($conn, $_POST['roomNo']);

        $query1 = "SELECT guest_id, firstname, lastname FROM reservations WHERE roomno = {$roomno}";
        $result = $conn->query($query1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $guest_id = $row['guest_id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
            }

            $history = $firstname . " " . $lastname . " occupied Room " . $roomno;

            $query2 = "UPDATE rooms set status = 'Occupied' WHERE roomno = {$roomno} AND guest_id = {$guest_id}";
            if ($conn->query($query2)) {
                $query3 = "INSERT INTO histories VALUES (DEFAULT, {$guest_id}, '{$history}', CURRENT_TIMESTAMP)";
                $conn->query($query3);
            }
        }
    }
}

?>