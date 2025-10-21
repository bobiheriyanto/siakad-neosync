<?php
// Simple migration runner: import sql/schema.sql
$base = __DIR__ . '/../';
$sqlFile = $base . 'sql/schema.sql';
if (!file_exists($sqlFile)) {
    echo "schema.sql not found\n";
    exit(1);
}
$cfg = require $base . 'app/config.php';
$dsn = "mysql:host={$cfg['db']['host']};charset={$cfg['db']['charset']}";
try {
    $pdo = new PDO($dsn, $cfg['db']['user'], $cfg['db']['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = file_get_contents($sqlFile);
    $pdo->exec($sql);
    echo "Migrasi selesai.\n";
} catch (Exception $e) {
    echo "Migrasi gagal: " . $e->getMessage() . "\n";
    exit(1);
}
