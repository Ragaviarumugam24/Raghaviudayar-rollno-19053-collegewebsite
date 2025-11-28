<?php requireRole('student'); ?>
<?php include '../includes/header.php'; ?>

<div class="container">

    <div class="card">
        <h2 class="card-title">My Profile</h2>

        <?php
        $user = getUser($_SESSION['user_id']);
        ?>

        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $user['name']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $user['username']; ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?php echo ucfirst($user['role']); ?></td>
            </tr>
        </table>

    </div>

</div>

<?php include '../includes/footer.php'; ?>
