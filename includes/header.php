<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../functions.php'; // adjust if your path differs

// small helper for active link
function is_active($path) {
    $cur = $_SERVER['REQUEST_URI'] ?? '';
    return strpos($cur, $path) !== false ? 'active' : '';
}

/*
 * CUSTOM LOGO SETTINGS
 * Place your logo file here (example):
 * C:/xampp/htdocs/college_website/includes/logo.png
 *
 * If the file is inside your document root (htdocs) it will be used via normal URL.
 * Otherwise it will be embedded as a data URI (works but not recommended for large files).
 */
$customLogoPath = 'C:/xampp/htdocs/college_website/includes/RC.jpg'; // <-- change filename if needed
$defaultLogoUrl  = '/college_website/public/includes/RC.jpg'; // fallback

$logoSrc = $defaultLogoUrl;
if (!empty($customLogoPath) && file_exists($customLogoPath) && is_readable($customLogoPath)) {
    $realLogo = realpath($customLogoPath);
    $docRoot  = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');

    if ($docRoot && strpos($realLogo, $docRoot) === 0) {
        // file is inside document root, compute a relative URL
        $relative = str_replace('\\', '/', substr($realLogo, strlen($docRoot)));
        if ($relative === '' || $relative[0] !== '/') $relative = '/' . $relative;
        $logoSrc = $relative;
    } else {
        // file is outside docroot -> embed as data URI (base64)
        $mime = mime_content_type($realLogo) ?: 'image/png';
        $data = base64_encode(file_get_contents($realLogo));
        $logoSrc = 'data:' . $mime . ';base64,' . $data;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>College Website</title>
  <link rel="stylesheet" href="/college_website/public/assets/css/style.css" />
  <style>
    /* small local header tweaks so logo sizes nicely */
    .brand img.logo { width: 125px; height: 125px; object-fit:contain; border-radius:6px; }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <div class="brand">
        <a href="/college_website/public/index.php" style="display:flex;align-items:center;gap:.6rem;text-decoration:none;color:inherit;">
          <!-- Logo: uses $logoSrc determined above -->
          <img src="<?php echo htmlspecialchars($logoSrc, ENT_QUOTES); ?>" alt="College Logo" class="logo" onerror="this.style.display='none'">
        </a>
      </div>

      <nav class="site-nav" aria-label="Main Navigation">
        <ul>
          <li class="<?= is_active('/public/index.php') ?>"><a href="/college_website/public/index.php">Home</a></li>
          <li class="<?= is_active('/public/about.php') ?>"><a href="/college_website/public/about.php">About</a></li>
          <li class="<?= is_active('/public/admissions.php') ?>"><a href="/college_website/public/admissions.php">Admissions</a></li>
          <li class="<?= is_active('/public/academics.php') ?>"><a href="/college_website/public/academics.php">Academics</a></li>
          <li class="<?= is_active('/public/contact.php') ?>"><a href="/college_website/public/contact.php">Contact</a></li>
        </ul>
      </nav>

      <div class="header-actions">
        <?php if (isLoggedIn()): ?>
          <?php $role = getUserRole(); ?>
          <?php if ($role === 'admin'): ?>
            <a class="btn small" href="/college_website/admin/dashboard.php">Admin</a>
          <?php elseif ($role === 'student'): ?>
            <a class="btn small" href="/college_website/student/dashboard.php">Student</a>
          <?php elseif ($role === 'faculty'): ?>
            <a class="btn small" href="/college_website/faculty/dashboard.php">Faculty</a>
          <?php endif; ?>

          <a class="btn small btn-ghost" href="/college_website/logout.php">Logout</a>
        <?php else: ?>
          <div class="login-links">
            <a class="btn small" href="/college_website/student/login.php">Student Login</a>
            <a class="btn small" href="/college_website/faculty/login.php">Faculty Login</a>
            <a class="btn small" href="/college_website/admin/login.php">Admin Login</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <main class="container main-content" role="main">
