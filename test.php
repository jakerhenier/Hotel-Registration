<?php 
require_once('includes/config/db.php');
// echo mysqli_real_escape_string($conn, sha1(sha1(sha1('admin',true)))); 
echo date('M j<\s\up>S</\s\up> Y', strtotime('2018-11-04 00:00:00'));
?>