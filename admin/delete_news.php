<?php
require_once '../functions.php';
requireRole('admin');
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

$id = intval($_REQUEST['id'] ?? 0);
if ($id <= 0) {
    header("Location: manage_news.php?success=" . urlencode("Invalid news ID"));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $stmt = $pdo->prepare("DELETE FROM news WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: manage_news.php?success=" . urlencode("News deleted"));
    exit;
}

include '../includes/header.php';
?>

<main>
    <h1>Confirm Delete News</h1>
    <form method="POST" action="delete_news.php">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <p>Are you sure you want to permanently delete news ID <?= $id; ?>?</p>
        <button type="submit">Yes, delete</button>
        <a href="manage_news.php">No, cancel</a>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
