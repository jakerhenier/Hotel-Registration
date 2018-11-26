<?php
function checkIfOccupied($conn, $roomno, $guest_id) {
    $status = '';

    $query = "SELECT * FROM rooms WHERE roomno = ? AND guest_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $roomno, $guest_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $status = $row['status'];
        }
    }
    return $status;
}
?>