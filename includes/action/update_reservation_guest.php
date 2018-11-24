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

if (isset($_POST['confirm'])) {
    $roomno = $conn->real_escape_string($_POST['confirm']);
    $check_in = $conn->real_escape_string(date("Y-m-d H:i:s", strtotime($_POST['check_in'])));
    $check_out = $conn->real_escape_string(date("Y-m-d H:i:s", strtotime($_POST['check_out'])));
    $noofadults = $conn->real_escape_string($_POST['noofadults']);
    $noofkids = $conn->real_escape_string($_POST['noofkids']);

    $query = 
    "UPDATE reservations 
    SET noofadults = {$noofadults}, 
        noofkids = {$noofkids}, 
        check_in = '{$check_in}', 
        check_out = '{$check_out}' 
    WHERE roomno = {$roomno} 
    AND guest_id = {$guestData[0]['guest_id']}";

    if ($conn->query($query)) {
        $_SESSION['success_msg'] = "Reservation has successfully edited.";
        header('location: ../../user_management/reservations.php');
    }
    else {
        echo $conn->error . '<br>' . $query;
    }
    
}
?>