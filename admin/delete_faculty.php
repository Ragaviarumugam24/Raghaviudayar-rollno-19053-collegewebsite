<?php
require_once '../functions.php';
requireRole('admin');
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

$id = intval($_REQUEST['id'] ?? 0);
if ($id <= 0) {
    header("Location: manage_faculty.php?success=" . urlencode("Invalid faculty ID"));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role = 'faculty'");
    $stmt->execute([$id]);

    header("Location: manage_faculty.php?success=" . urlencode("Faculty deleted"));
    exit;
}

include '../includes/header.php';
?>

<main>
    <h1>Confirm Delete Faculty</h1>
    <form method="POST" action="delete_faculty.php">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <p>Are you sure you want to permanently delete faculty ID <?= $id; ?>?</p>
        <button type="submit">Yes, delete</button>
        <a href="manage_faculty.php">No, cancel</a>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
