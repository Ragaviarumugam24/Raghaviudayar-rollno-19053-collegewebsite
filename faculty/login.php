<?php 
require_once '../includes/auth.php';
require_once '../includes/header.php'; 
?>

<main>
    <h1>Faculty Login</h1>

    <form method="POST" action="">
        <!-- CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <!-- Force role = faculty -->
        <input type="hidden" name="role" value="faculty">

        <div>
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Login</button>
    </form>

    <style>
/* Gradient Buttons + Press Effect */
.btn{
  border:none;
  background:linear-gradient(45deg,#4a6cf7,#6f9cf7);
  color:#fff !important;
  padding:.6rem .95rem;
  border-radius:8px;
  cursor:pointer;
  transition:all .25s ease;
  box-shadow:0 4px 12px rgba(0,0,0,.15);
  transform:translateY(0);
}
.btn:hover{
  background:linear-gradient(45deg,#6f9cf7,#4a6cf7);
  box-shadow:0 8px 22px rgba(0,0,0,.2);
  transform:translateY(-3px);
}
.btn:active{
  transform:scale(.96);
  box-shadow:0 2px 6px rgba(0,0,0,.2);
}

.btn{border:2px solid #0b6efd;}
.btn:hover{background:#fff !important;color:#0b6efd !important;border-color:#0b6efd !important;box-shadow:0 8px 20px rgba(0,0,0,0.1) !important;transform:translateY(-3px) !important;}
</style>

    <?php 
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
</main>

<?php include '../includes/footer.php'; ?>
