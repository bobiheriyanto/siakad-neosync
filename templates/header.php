<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>SIAKAD NeoSync</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>body{padding:20px}</style>
</head>
<body>
<?php if (!empty($_SESSION['user'])): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">SIAKAD NeoSync</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/index.php">Dashboard</a></li>
      </ul>
      <span class="navbar-text">
        <?=htmlspecialchars($_SESSION['user']['username'])?> | <a href="/logout.php">Logout</a>
      </span>
    </div>
  </div>
</nav>
<?php endif; ?>
<div class="container">
