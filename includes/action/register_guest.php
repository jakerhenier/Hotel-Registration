<?php 
session_start();
require_once('../function/functions.php');

if (isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contactno = $_POST['contactno'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkIfUsernameExists($username)) {
        $_SESSION['reg_msg'] = "Username has already been taken.";
        header('location: ../../registration.php');
    }
    else {
        registerGuest($firstname, $lastname, $contactno, $username, $password);
        $_SESSION['reg_msg'] = "Successfully Registered";
        header('location: ../../login.php');
    }
}
?>