<?php requireRole('admin'); ?>
<?php include '../includes/header.php'; ?>

<div class="container">

    <div class="card">
        <h2 class="card-title">Manage News</h2>

        <form method="POST">
            <input type="text" name="title" placeholder="News Title" required>
            <textarea name="content" placeholder="News Content" required></textarea>
            <button class="btn-primary" name="add">Publish News</button>
        </form>

        <?php
        global $pdo;

        if (isset($_POST['add'])) {
            $stmt = $pdo->prepare("INSERT INTO news (title, content, created_by) VALUES (?, ?, ?)");
            $stmt->execute([$_POST['title'], $_POST['content'], $_SESSION['user_id']]);
            echo "<p class='success-msg'>News Published.</p>";
        }

        if (isset($_GET['delete'])) {
            $pdo->prepare("DELETE FROM news WHERE id = ?")->execute([$_GET['delete']]);
            echo "<p class='success-msg'>News Deleted.</p>";
        }

        $news = $pdo->query("SELECT * FROM news ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2 class="card-title">News List</h2>

        <table class="table">
            <thead>
                <tr><th>ID</th><th>Title</th><th>Actions</th></tr>
            </thead>

            <tbody>
                <?php foreach ($news as $n): ?>
                <tr>
                    <td><?= $n['id'] ?></td>
                    <td><?= $n['title'] ?></td>
                    <td>
                        <a class="btn-edit" href="manage_news_edit.php?id=<?= $n['id'] ?>">Edit</a>
                        <a class="btn-delete" href="?delete=<?= $n['id'] ?>" onclick="return confirm('Delete news?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php include '../includes/footer.php'; ?>
