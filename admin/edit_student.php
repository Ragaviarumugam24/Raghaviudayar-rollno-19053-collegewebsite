<?php
require_once '../functions.php';
requireRole('admin');
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
include '../includes/header.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header("Location: manage_students.php?success=" . urlencode("Invalid student ID"));
    exit;
}

// Fetch student
$stmt = $pdo->prepare("SELECT id, name, username FROM users WHERE id = ? AND role = 'student'");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    header("Location: manage_students.php?success=" . urlencode("Student not found"));
    exit;
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'] ?? '';

    if ($password !== '') {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, username = ?, password = ? WHERE id = ? AND role = 'student'");
        $stmt->execute([$name, $username, hashPassword($password), $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, username = ? WHERE id = ? AND role = 'student'");
        $stmt->execute([$name, $username, $id]);
    }

    header("Location: manage_students.php?success=" . urlencode("Student updated"));
    exit;
}
?>

<main>
    <h1>Edit Student</h1>

    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <div><label>Name</label><input type="text" name="name" value="<?= htmlspecialchars($student['name']); ?>" required></div>
        <div><label>Username</label><input type="text" name="username" value="<?= htmlspecialchars($student['username']); ?>" required></div>
        <div><label>New Password (leave blank to keep)</label><input type="password" name="password"></div>
        <button type="submit">Save</button>
        <a href="manage_students.php">Cancel</a>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
