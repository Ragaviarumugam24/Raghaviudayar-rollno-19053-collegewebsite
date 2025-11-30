<?php
$host = "caboose.proxy.rlwy.net";
$port = 18837;
$user = "root";
$pass = "PZWLRTDuiugQGaJdOSVOpixtmiiOcRbZ";
$db = "railway";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "DB Connected!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
