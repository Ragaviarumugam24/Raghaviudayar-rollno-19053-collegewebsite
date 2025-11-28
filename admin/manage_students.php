<?php requireRole('admin'); ?>
<?php include '../includes/header.php'; ?>

<div class="container">

    <div class="card">
        <h2 class="card-title">Manage Students</h2>

        <!-- Add Student -->
        <form method="POST">
            <input type="text" name="name" placeholder="Student Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn-primary" type="submit" name="add">Add Student</button>
        </form>

        <?php
        global $pdo;

        // Add
        if (isset($_POST['add'])) {
            $stmt = $pdo->prepare("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, 'student')");
            $stmt->execute([$_POST['name'], $_POST['username'], hashPassword($_POST['password'])]);
            echo "<p class='success-msg'>Student Added.</p>";
        }

        // Delete
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $pdo->prepare("DELETE FROM users WHERE id = ? AND role = 'student'")->execute([$id]);
            echo "<p class='success-msg'>Student Deleted.</p>";
        }

        // Fetch all students
        $students = $pdo->query("SELECT * FROM users WHERE role='student'")->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2 class="card-title">Student List</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Username</th><th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= $s['name'] ?></td>
                    <td><?= $s['username'] ?></td>
                    <td>
                        <a class="btn-edit" href="manage_students_edit.php?id=<?= $s['id'] ?>">Edit</a>
                        <a class="btn-delete" href="?delete=<?= $s['id'] ?>" onclick="return confirm('Delete student?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
