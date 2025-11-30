<?php
// Start session once for all requests
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Railway MySQL Database Configuration
define('DB_HOST', 'caboose.proxy.rlwy.net');
define('DB_PORT', '18837');
define('DB_NAME', 'railway');
define('DB_USER', 'root');
define('DB_PASS', 'PZWLRTDuiugQGaJdOSVOpixtmiiOcRbZ');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

    // Optional strict mode
    // $pdo->exec("SET sql_mode='STRICT_ALL_TABLES'");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

