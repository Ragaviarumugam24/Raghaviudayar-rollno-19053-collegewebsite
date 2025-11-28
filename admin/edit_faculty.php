<?php
require_once '../functions.php';
requireRole('admin');
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
include '../includes/header.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header("Location: manage_faculty.php?success=" . urlencode("Invalid faculty ID"));
    exit;
}

$stmt = $pdo->prepare("SELECT id, name, username FROM users WHERE id = ? AND role = 'faculty'");
$stmt->execute([$id]);
$faculty = $stmt->fetch();

if (!$faculty) {
    header("Location: manage_faculty.php?success=" . urlencode("Faculty not found"));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'] ?? '';

    if ($password !== '') {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, username = ?, password = ? WHERE id = ? AND role = 'faculty'");
        $stmt->execute([$name, $username, hashPassword($password), $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, username = ? WHERE id = ? AND role = 'faculty'");
        $stmt->execute([$name, $username, $id]);
    }

    header("Location: manage_faculty.php?success=" . urlencode("Faculty updated"));
    exit;
}
?>

<main>
    <h1>Edit Faculty</h1>

    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <div><label>Name</label><input type="text" name="name" value="<?= htmlspecialchars($faculty['name']); ?>" required></div>
        <div><label>Username</label><input type="text" name="username" value="<?= htmlspecialchars($faculty['username']); ?>" required></div>
        <div><label>New Password (leave blank to keep)</label><input type="password" name="password"></div>
        <button type="submit">Save</button>
        <a href="manage_faculty.php">Cancel</a>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
