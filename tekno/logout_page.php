<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the FP.php page
header("Location: Index.php");
exit();
?>
