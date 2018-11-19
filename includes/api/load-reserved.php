<?php 
require_once('../config/db.php');

$query = "SELECT * FROM rooms INNER JOIN clients ON rooms.client_id = clients.client_id WHERE status = 'Reserved';";
$result = $conn->query($query);
echo   '<tr>
            <th>Room number</th>
            <th>Room type</th>
            <th>Guest name</th>
        </tr>
        ';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo   '<tr>
                    <td>'.$row['roomNo'].'</td>
                    <td>'.$row['roomType'].'</td>
                    <td>'.$row['lastname'].', '.$row['firstname'].'</td>
                    <td><button value='.$row['roomNo'].' id="trigger" type="submit">Confirm</button></td>
                </tr>';
    }
}
mysqli_free_result($result);
$conn->close();
?>