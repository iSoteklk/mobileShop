<?php
// Start the session
session_start();

// Unset all session variables
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['contact']);
unset($_SESSION['status']);
unset($_SESSION['title']);

// Destroy the session
session_destroy();

// Redirect to login.php
header("Location: login.php");
exit();
?>
