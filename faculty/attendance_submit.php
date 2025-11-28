<?php requireRole('faculty'); ?>
<?php include '../includes/header.php'; ?>

<div class="container">

    <div class="card">
        <h2 class="card-title">Submit Attendance</h2>

        <?php
        // Handle attendance submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = sanitize($_POST['date']);
            $subject = sanitize($_POST['subject']);
            $present = sanitize($_POST['present']);

            global $pdo;
            $stmt = $pdo->prepare("
                INSERT INTO attendance (faculty_id, date, subject, present)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$_SESSION['user_id'], $date, $subject, $present]);

            echo "<p class='success-msg'>Attendance submitted.</p>";
        }
        ?>

        <form method="POST">
            <label>Date</label>
            <input type="date" name="date" required>

            <label>Subject</label>
            <input type="text" name="subject" placeholder="Subject" required>

            <label>Students Present</label>
            <input type="number" name="present" placeholder="Number of Present Students" required>

            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>

    <div class="card" style="margin-top: 25px;">
        <h2 class="card-title">Submitted Attendance</h2>

        <?php
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM attendance WHERE faculty_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Subject</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $row): ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['present']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php include '../includes/footer.php'; ?>
