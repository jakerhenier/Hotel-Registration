<?php 
include_once('db.php');


if(isset($_POST['roomSelect'])) {
    if($_POST['roomSelect'] == "") {
        echo '';
    }
    else {
        $roomSelect = mysqli_real_escape_string($conn, $_POST['roomSelect']);
        $query = "SELECT * FROM rooms WHERE roomtype = '{$roomSelect}'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo 
                    '<tr>
                        <td><input value='.$row['roomNo'].' type="radio" id=\'roomNo\' name=\'roomNo\'></td>
                        <td><label for=\'roomNo\'>Room '.$row['roomNo'].'</label></td>
                        <td><label for=\'roomNo\'>₱ '.$row['rate'].'</label></td>
                    </tr>';
            }
        }
        else {
            echo '';
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

?>