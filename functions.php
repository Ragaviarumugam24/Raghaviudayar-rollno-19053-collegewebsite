<?php
require_once 'config.php';

// Sanitize input safely
function sanitize($data) {
    return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
}

// Hash password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Verify password
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Get user role
function getUserRole() {
    return $_SESSION['role'] ?? null;
}

// Redirect if not logged in or wrong role
function requireRole($role) {
    if (!isLoggedIn() || getUserRole() !== $role) {
        header('Location: ../public/index.php');
        exit;
    }
}

// Get user by ID
function getUser($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>
