<?php 
$errors = array();

function resetSession($new_errors) {
    $_SESSION['reservation_msg'] = $new_errors;
}

function validate_user_reservation($noofadults, $noofkids, $check_in, $check_out, $roomno, $paymenttype) {
    $first = validate_adults($noofadults);
    $second = validate_kids($noofkids);
    $third = validate_checkin($check_in);
    $fourth = validate_checkout($check_out);
    $fifth = validate_roomno($roomno);
    $sixth = validate_payment($paymenttype);

    if ($first && $second && $third && $fourth && $fifth && $sixth) {
        return true;
    }
}

function validate_adults($noofadults) {
    global $errors;

    if ("" == trim($noofadults)) {
        array_push($errors, "Adults count can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if ($noofadults < 1) {
        array_push($errors, "Must have atleast 1 adult in the reservation.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if ($noofadults != strip_tags($noofadults)) {
        array_push($errors, "Adults count contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if (preg_match('/[A-Za-z]/', $noofadults)) {
        array_push($errors, "Adults count can't contain letters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

function validate_kids($noofkids) {
    global $errors;

    if ("" == trim($noofkids)) {
        array_push($errors, "Kids count can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if ($noofkids != strip_tags($noofkids)) {
        array_push($errors, "Kids count contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if (preg_match('/[A-Za-z]/', $noofkids)) {
        array_push($errors, "Kids count can't contain letters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

function validate_checkin($check_in) {
    global $errors;

    list($year, $month, $day) = explode('-', $check_in);

    if (!checkdate($month, $day, $year)) {
        array_push($errors, "Check-in date is invalid.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

function validate_checkout($check_out) {
    global $errors;

    list($year, $month, $day) = explode('-', $check_out);

    if (!checkdate($month, $day, $year)) {
        array_push($errors, "Check-out date is invalid.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

function validate_roomno($roomno) {
    global $errors;

    if ("" == trim($roomno)) {
        array_push($errors, "Room number can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if ($roomno != strip_tags($roomno)) {
        array_push($errors, "Room number contains invalid characters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if (preg_match('/[A-Za-z]/', $roomno)) {
        array_push($errors, "Room number can't contain letters.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

function validate_payment($paymenttype) {
    global $errors;

    if ("" == trim($paymenttype)) {
        array_push($errors, "Payment type can't be empty.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if (strlen($paymenttype) < 6) {
        array_push($errors, "Payment type is invalid.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if ($paymenttype != strip_tags($paymenttype)) {
        array_push($errors, "Payment type is invalid.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else if (preg_match('/[0-9]/', $paymenttype)) {
        array_push($errors, "Payment type is invalid.");
        resetSession($errors);
        header('location: ../../user_management/reserve.php');
    }
    else {
        return true;
    }
}

?>