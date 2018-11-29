<?php 
session_start();
require_once('../config/db.php');

$guestData = '';

if (isset($_SESSION['guest_session'])) {
    $guestData = $_SESSION['guest_session'];
}

if (isset($_POST['close'])) {
    header('location: ../../user_management/reservations.php');
}

$guest_id = $guestData[0]['guest_id'];
$firstname = $guestData[0]['firstname'];
$lastname = $guestData[0]['lastname'];

if (isset($_POST['confirm'])) {
    $roomno = $conn->real_escape_string($_POST['confirm']);
    $check_in = $conn->real_escape_string(date("Y-m-d H:i:s", strtotime($_POST['check_in'])));
    $check_out = $conn->real_escape_string(date("Y-m-d H:i:s", strtotime($_POST['check_out'])));
    $noofadults = $conn->real_escape_string($_POST['noofadults']);
    $noofkids = $conn->real_escape_string($_POST['noofkids']);

    $history = $firstname . " " . $lastname . " updated his reservation on Room " . $roomno;

    $query = 
    "UPDATE reservations 
    SET noofadults = {$noofadults}, 
        noofkids = {$noofkids}, 
        check_in = '{$check_in}', 
        check_out = '{$check_out}'
    WHERE roomno = {$roomno} 
    AND guest_id = {$guest_id}";

    echo $query;

    if ($conn->query($query)) {
        $his_query = "INSERT INTO histories VALUES (DEFAULT, {$guest_id}, '$history', CURRENT_TIMESTAMP)";
        if ($conn->query($his_query)) {
            $_SESSION['success_msg'] = "Reservation has successfully edited.";
            header('location: ../../user_management/reservations.php');
        }
        else {
            $_SESSION['error_msg'] = "Wow hackerman ampota!";
            header('location: ../../user_management/reservations.php');
        }
    }
    else {
        $_SESSION['error_msg'] = "Wow hackerman ampota!";
        header('location: ../../user_management/reservations.php');
    }   
}
else {
    header('location: ../../user_management/reservations.php');
}
?>