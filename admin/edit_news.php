<?php
require_once '../functions.php';
requireRole('admin');
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
include '../includes/header.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header("Location: manage_news.php?success=" . urlencode("Invalid news ID"));
    exit;
}

$stmt = $pdo->prepare("SELECT id, title, content FROM news WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
    header("Location: manage_news.php?success=" . urlencode("News not found"));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $stmt = $pdo->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);

    header("Location: manage_news.php?success=" . urlencode("News updated"));
    exit;
}
?>

<main>
    <h1>Edit News</h1>

    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <div><label>Title</label><input type="text" name="title" value="<?= htmlspecialchars($item['title']); ?>" required></div>
        <div><label>Content</label><textarea name="content" required><?= htmlspecialchars($item['content']); ?></textarea></div>
        <button type="submit">Save</button>
        <a href="manage_news.php">Cancel</a>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
