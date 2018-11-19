<?php 
require_once('../config/db.php');


if(isset($_POST['roomNo'])) {
    if($_POST['roomNo'] == "") {
        echo '';
    }
    else {
        $roomNo = mysqli_real_escape_string($conn, $_POST['roomNo']);
        
        $query = "UPDATE rooms SET status = 'Occupied' WHERE roomNo = {$roomNo}";
        $conn->query($query);

        mysqli_close($conn);
    }
}

?>