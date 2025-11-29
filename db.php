<?php
$host = "caboose.proxy.rlwy.net";
$port = 18837;
$user = "root";
$pass = "PZWLRTDuiugQGaJdOSVOpixtmiiOcRbZ";
$db = "railway";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
