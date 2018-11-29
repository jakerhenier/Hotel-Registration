<?php 
session_start();
require_once('../config/db.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, sha1(sha1(sha1($_POST['password'], true))));

    $userdata = array(); // Empty array to be populated with mysql rows

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userdata[] = $row;
            }
            $_SESSION['admin_session'] = $userdata;
            header('location: ../../management/index.php');
        }
        else {
            $_SESSION['error'] = "Username and Password doesn't match.";
            header('location: ../../management/login.php');
        }

        $stmt->close();
    }
}
else {
    header('location: ../../management/login.php');
}
?>