<?php 
include_once('../config/db.php');


if(isset($_POST['roomSelect'])) {
    if($_POST['roomSelect'] == "") {
        echo '';
    }
    else {
        $roomSelect = mysqli_real_escape_string($conn, $_POST['roomSelect']);
        $query = "SELECT * FROM rooms WHERE roomtype = '{$roomSelect}' AND status = 'Available'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo 
                    '<tr>
                        <td>
                            <label>
                                <input value='.$row['roomNo'].' type="radio" id=\'roomNo\' name=\'roomNo\' required>
                                <div class = "itemstat"></div>
                                <div class = "labels">
                                    <label for="roomNo">Room '.$row['roomNo'].' &emsp;&emsp;&emsp;&emsp; ₱ '.$row['rate'].'</label>
                                </div>
                            </label>
                        </td>
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