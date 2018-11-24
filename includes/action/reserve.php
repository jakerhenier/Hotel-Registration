<?php
session_start();
require_once('../config/db.php');

$guestData = '';

if (isset($_SESSION['guest_session'])) {
    $guestData = $_SESSION['guest_session'];
}

if (isset($_POST['reserve'])) {
    $noofadults = mysqli_real_escape_string($conn, $_POST['noofadults']);
    $noofkids = mysqli_real_escape_string($conn, $_POST['noofkids']);
    $check_in = mysqli_real_escape_string($conn, date("Y-m-d H:i:s", strtotime($_POST['check_in'])));
    $check_out = mysqli_real_escape_string($conn, date("Y-m-d H:i:s", strtotime($_POST['check_out'])));
    $roomNo = mysqli_real_escape_string($conn, $_POST['roomNo']);
    $paymenttype = mysqli_real_escape_string($conn, $_POST['paymenttype']);

    $query = "INSERT INTO reservations VALUES ";
    $query .= "({$guestData[0]['guest_id']}, '{$guestData[0]['lastname']}', '{$guestData[0]['firstname']}', '{$guestData[0]['contactno']}', {$noofadults}, {$noofkids}, '{$check_in}', '{$check_out}', {$roomNo}, '{$paymenttype}')";

    if ($conn->query($query)) {
        $up_query = "UPDATE rooms SET guest_id = {$guestData[0]['guest_id']}, status = 'Reserved' WHERE roomNo = {$roomNo}";
        if ($conn->query($up_query)) {
            header('location: ../../user_management/reservations.php');
        }
        else {
            echo "Error: " . $up_query . "<br>" . $conn->error;    
        }
    }
    else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>