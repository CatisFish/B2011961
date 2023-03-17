<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the cookie
setcookie("user", "", time() - 3600);

// Redirect to the login page
header("Location: dangnhap.php");
exit;
?>
