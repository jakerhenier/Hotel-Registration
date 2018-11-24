<?php
session_start();
require_once('../function/functions.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkIfUserExists($username, $password)) {
        header('location: ../../user_management/reservations.php');
    }
    else {
        $_SESSION['login_msg'] = "Incorrect credentials entered.";
        header('location: ../../user_management/login.php');
    }
}
?>