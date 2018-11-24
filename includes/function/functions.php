<?php 
// session_start();
require_once('../config/db.php');

function checkIfUsernameExists($username) {
    global $conn;

    $query = "SELECT * FROM guests WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true;
    }
    return false;
}

function registerGuest($firstname, $lastname, $contactno, $username, $password) {
    global $conn;

    $firstname = $conn->real_escape_string($firstname);
    $lastname = $conn->real_escape_string($lastname);
    $contactno = $conn->real_escape_string($contactno);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string(sha1(sha1($password, true)));

    $query = "INSERT INTO guests (firstname, lastname, contactno, username, password) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssss', $firstname, $lastname, $contactno, $username, $password);
    $stmt->execute();
}

function checkifUserExists($username, $password) {
    global $conn;
    $guestData = array();

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string(sha1(sha1($password, true)));

    $query = "SELECT * FROM guests WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $guestData[] = $row;
        }
        $_SESSION['guest_session'] = $guestData;
        return true;
    }
    else {
        return false;
    }
}
?>