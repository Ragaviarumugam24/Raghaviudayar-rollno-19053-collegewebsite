<?php
// Start session once for all requests
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'college_website');
define('DB_USER', 'root'); 
define('DB_PASS', '');     

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

    // Strict SQL mode for better data safety
    $pdo->exec("SET sql_mode='STRICT_ALL_TABLES'");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
