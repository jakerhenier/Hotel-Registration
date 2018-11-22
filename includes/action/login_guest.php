<?php
session_start();
require_once('../function/functions.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkIfUserExists($username, $password)) {
        
    }
    else {
        $_SESSION['login_msg'] = "Incorrect credentials entered.";
        header('location: ../../login.php');
    }
}
?>