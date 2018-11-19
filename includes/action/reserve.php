<?php 
require_once('../config/db.php');

if (isset($_POST['reserve'])) {
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
    $noofadults = mysqli_real_escape_string($conn, $_POST['noofadults']);
    $noofkids = mysqli_real_escape_string($conn, $_POST['noofkids']);
    $check_in = mysqli_real_escape_string($conn, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($conn, $_POST['check_out']);
    $roomNo = mysqli_real_escape_string($conn, $_POST['roomNo']);
    $paymenttype = mysqli_real_escape_string($conn, $_POST['paymenttype']);

    $query = "INSERT INTO clients VALUES ";
    $query .= "(DEFAULT, '{$lastname}', '{$firstname}', '{$contactno}', {$noofadults}, {$noofkids}, '{$check_in}', '{$check_out}', {$roomNo}, '{$paymenttype}')";

    if ($conn->query($query)) {
        $last_id = $conn->insert_id;
        $up_query = "UPDATE rooms SET client_id = {$last_id}, status = 'Reserved' WHERE roomNo = {$roomNo}";
        if ($conn->query($up_query)) {
            header('location: ../../success.php');
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