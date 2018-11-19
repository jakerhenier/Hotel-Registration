<?php 
require_once('../config/db.php');


if(isset($_POST['roomSelect'])) {
    if($_POST['roomSelect'] == "") {
        echo '';
    }
    else {
        $roomSelect = mysqli_real_escape_string($conn, $_POST['roomSelect']);
        if ($roomSelect == 'all') {
            $query = "SELECT * FROM rooms";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo   '<tr type="checkbox">
                            <th>Room number</th>
                            <th>State</th>
                        </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['status'] == 'Available') {
                        echo 
                            '<tr type="checkbox" id='.$row['roomNo'].'>
                                <td>'.$row['roomNo'].'</td>
                                <td>'.$row['status'].'</td>
                            </tr>';
                    }
                    else {
                        echo 
                            '<tr id='.$row['roomNo'].'>
                                <td>'.$row['roomNo'].'</td>
                                <td>'.$row['status'].'</td>
                            </tr>';
                    }
                }
            }
            else {
                echo '';
            }
        }
        else {
            $query = "SELECT * FROM rooms WHERE roomtype = '{$roomSelect}'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo   '<tr>
                            <th>Room number</th>
                            <th>State</th>
                        </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo 
                        '<tr id='.$row['roomNo'].'>
                            <td>'.$row['roomNo'].'</td>
                            <td>'.$row['status'].'</td>
                        </tr>';
                }
            }
            else {
                echo '';
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

?>