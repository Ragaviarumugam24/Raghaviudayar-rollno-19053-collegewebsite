<?php
session_start();
require_once '../functions.php';

// Create CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $expected_role = $_POST['role'] ?? null;   // admin/student/faculty

    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Check user exists
    if ($user) {

        // 1. Check password (plain text)
        if ($password !== $user['password']) {
            $error = "Invalid credentials.";
        }
        // 2. Check role (admin/student/faculty)
        elseif ($expected_role !== null && $expected_role !== $user['role']) {
            $error = "Invalid credentials.";
        }
        else {
            // Success → set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect according to role
            switch ($user['role']) {
                case 'admin':
                    header('Location: ../admin/dashboard.php');
                    exit;
                case 'student':
                    header('Location: ../student/dashboard.php');
                    exit;
                case 'faculty':
                    header('Location: ../faculty/dashboard.php');
                    exit;
            }
        }

    } else {
        $error = "Invalid credentials.";
    }
}
?>
