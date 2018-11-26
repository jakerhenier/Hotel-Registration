<?php 
session_start();
require_once('../config/db.php');

$guestData = '';

if (isset($_SESSION['guest_session'])) {
    $guestData = $_SESSION['guest_session'];
}

if (isset($_POST['no'])) {
    header('location: ../../user_management/reservations.php');
}

$guest_id = $guestData[0]['guest_id'];
$firstname = $guestData[0]['firstname'];
$lastname = $guestData[0]['lastname'];

if (isset($_POST['yes'])) {
    $roomno = $conn->real_escape_string($_POST['yes']);

    $history = $firstname . " " . $lastname . " cancelled his reservation on Room " . $roomno;

    $res_query = "DELETE FROM reservations WHERE guest_id = {$guest_id} AND roomno = {$roomno}";
    if ($conn->query($res_query)) {
        $room_query = "UPDATE rooms SET status = 'Available', guest_id = 0 WHERE roomno = {$roomno}";
        if ($conn->query($room_query)) {
            $his_query = "INSERT INTO histories VALUES (DEFAULT, {$guest_id}, '{$history}', CURRENT_TIMESTAMP)";
            if ($conn->query($his_query)) {
                $_SESSION['success_msg'] = "Reservation on Room ".$roomno." has successfully cancelled.";
                header('location: ../../user_management/reservations.php');
            }
            else {
                echo "Error: " . $his_query . "<br>" . $conn->error;
            }
        }
        else {
            echo "Error: " . $room_query . "<br>" . $conn->error;
        }
    }
    else {
        echo "Error: " . $res_query . "<br>" . $conn->error;
    }
}

?>