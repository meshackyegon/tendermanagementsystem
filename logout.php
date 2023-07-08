<?php
include_once 'function.php';
$log['user_id'] = $_SESSION['id'];
$log['email']=$_SESSION['email'];
$log['action_made'] = "Logged out in the system '$_SESSION[email]'.";
save_log($log);
session_unset();
session_destroy();
header("Location: login.php");
exit();
// header("Location: login.php");
 ?>
 