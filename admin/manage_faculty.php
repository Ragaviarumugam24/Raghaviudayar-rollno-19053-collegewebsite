<?php requireRole('admin'); ?>
<?php include '../includes/header.php'; ?>

<div class="container">

    <div class="card">
        <h2 class="card-title">Manage Faculty</h2>

        <form method="POST">
            <input type="text" name="name" placeholder="Faculty Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn-primary" name="add">Add Faculty</button>
        </form>

        <?php
        global $pdo;

        if (isset($_POST['add'])) {
            $stmt = $pdo->prepare("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, 'faculty')");
            $stmt->execute([$_POST['name'], $_POST['username'], hashPassword($_POST['password'])]);
            echo "<p class='success-msg'>Faculty Added.</p>";
        }

        if (isset($_GET['delete'])) {
            $pdo->prepare("DELETE FROM users WHERE id = ? AND role='faculty'")->execute([$_GET['delete']]);
            echo "<p class='success-msg'>Faculty Deleted.</p>";
        }

        $faculty = $pdo->query("SELECT * FROM users WHERE role='faculty'")->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2 class="card-title">Faculty List</h2>

        <table class="table">
            <thead>
                <tr><th>ID</th><th>Name</th><th>Username</th><th>Actions</th></tr>
            </thead>

            <tbody>
                <?php foreach ($faculty as $f): ?>
                <tr>
                    <td><?= $f['id'] ?></td>
                    <td><?= $f['name'] ?></td>
                    <td><?= $f['username'] ?></td>
                    <td>
                        <a class="btn-edit" href="manage_faculty_edit.php?id=<?= $f['id'] ?>">Edit</a>
                        <a class="btn-delete" href="?delete=<?= $f['id'] ?>" onclick="return confirm('Delete faculty?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
