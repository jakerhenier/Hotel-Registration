<?php 
$errors = array();

function resetSession($new_errors) {
    $_SESSION['reg_msg'] = $new_errors;
}

function validate_user_registration($firstname, $lastname, $contactno, $username, $password) {
    $first = validate_firstname($firstname);
    $second = validate_lastname($lastname);
    $third = validate_contactno($contactno);
    $fourth = validate_username($username);
    $fifth = validate_password($password);

    if ($first && $second && $third && $fourth && $fifth) {
        return true;
    }
}

function validate_firstname($firstname) {
    global $errors;

    if ("" == trim($firstname)) {
        array_push($errors, "Firstname can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (strlen($firstname) <= 1) {
        array_push($errors, "Firstname can't be one letter only.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if ($firstname != strip_tags($firstname)) {
        array_push($errors, "Firstname contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (preg_match('/[A-Za-z]/', $firstname) && preg_match('/[0-9]/', $firstname)) {
        array_push($errors, "Firstname contains numbers which is invalid.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else {
        return true;
    }
}

function validate_lastname($lastname) {
    global $errors;

    if ("" == trim($lastname)) {
        array_push($errors, "Lastname can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (strlen($lastname) <= 1) {
        array_push($errors, "Lastname can't be one letter only.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if ($lastname != strip_tags($lastname)) {
        array_push($errors, "Lastname contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    } 
    else if (preg_match('/[A-Za-z]/', $lastname) && preg_match('/[0-9]/', $lastname)) {
        array_push($errors, "Lastname contains numbers which is invalid.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else {
        return true;
    }
}

function validate_contactno($contactno) {
    global $errors;

    if ("" == trim($contactno)) {
        array_push($errors, "Contact number can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (strlen((string) $contactno) < 10) {
        array_push($errors, "Contact number must be 10 or 12 digits.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if ($contactno != strip_tags($contactno)) {
        array_push($errors, "Contact number contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (preg_match('/[A-Za-z]/', $contactno)) {
        array_push($errors, "Contact number can't contain letters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else {
        return true;
    }
}

function validate_username($username) {
    global $errors;

    if ("" == trim($username)) {
        array_push($errors, "Username can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (strlen($username) < 6) {
        array_push($errors, "Username must have a minimum of 6 characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (preg_match('/\\s/', $username)) {
        array_push($errors, "Username can't contain spaces.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if ($username != strip_tags($username)) {
        array_push($errors, "Username contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (preg_match('/[0-9].*[A-Za-z]/', $username)) {
        array_push($errors, "Username must start with a letter.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else {
        return true;
    }
}

function validate_password($password) {
    global $errors;

    if ("" == trim($password)) {
        array_push($errors, "Password can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (strlen($password) < 8) {
        array_push($errors, "Password must have a minimum of 8 characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if (preg_match('/\\s/', $password)) {
        array_push($errors, "Password can't contain spaces.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else if ($password != strip_tags($password)) {
        array_push($errors, "Password contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/registration.php');
    }
    else {
        return true;
    }
}

?>