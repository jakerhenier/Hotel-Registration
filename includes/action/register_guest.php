<?php 
session_start();
require_once('../function/functions.php');
require_once('../function/user_reg_validations.php');

if (isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contactno = $_POST['contactno'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validate_user_registration($firstname, $lastname, $contactno, $username, $password)) {
        if (checkIfUsernameExists($username)) {
            array_push($errors, "Username has already been taken.");
            resetSession($errors);
            header('location: ../../user_management/registration.php');
        }
        else {
            registerGuest($firstname, $lastname, $contactno, $username, $password);
            $_SESSION['reg_msg'] = "Successfully Registered";
            header('location: ../../user_management/login.php');
        }
    }
}
?>