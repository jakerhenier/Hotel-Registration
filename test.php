<?php 
require_once('includes/config/db.php');
// echo mysqli_real_escape_string($conn, sha1(sha1(sha1('admin',true)))); 
// echo date('d', strtotime('2018-11-04 00:00:00'));

$date1 = date_create("2015-01-01");
$date2 = date_create("2015-01-15");
$diff = date_diff($date1, $date2);
echo $diff->format('%a');
?>