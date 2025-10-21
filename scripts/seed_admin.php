<?php
// Seed admin user. Run: php scripts/seed_admin.php
require __DIR__ . '/../app/config.php';
$config = require __DIR__ . '/../app/config.php';
$dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
$pdo = new PDO($dsn, $config['db']['user'], $config['db']['pass']);
$username = readline('Admin username [admin]: ');
$username = $username ?: 'admin';
$password = readline('Admin password [admin123]: ');
$password = $password ?: 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:u, :p, 'admin')");
$stmt->execute([':u' => $username, ':p' => $hash]);
echo "Admin user created: {$username}\n";
