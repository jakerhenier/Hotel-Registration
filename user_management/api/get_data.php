<?php 
require_once('../../includes/config/db.php');

$reserveData = array();

if (isset($_POST['roomno'])) {
    $query = "SELECT * FROM reservations WHERE roomno = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_POST['roomno']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reserveData[] = $row;
        }
    }

    echo json_encode($reserveData);
}
?>