<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session completely
session_destroy();

// Redirect to homepage (public index)
header("Location: public/index.php");
exit;
?>
