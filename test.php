<?php 
require_once('includes/config/db.php');
echo mysqli_real_escape_string($conn, sha1(sha1(sha1('admin',true))));
?>