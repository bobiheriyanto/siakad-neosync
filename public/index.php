<?php
require_once __DIR__ . '/../app/auth.php';
$u = current_user();
if (!$u) {
    header('Location: /login.php');
    exit;
}
switch ($u['role']) {
    case 'admin': header('Location: /admin/dashboard.php'); break;
    case 'mahasiswa': header('Location: /student/dashboard.php'); break;
    case 'dosen': header('Location: /dosen/dashboard.php'); break;
    case 'baak': header('Location: /baak/dashboard.php'); break;
    case 'bauk': header('Location: /bauk/dashboard.php'); break;
    case 'prodi': header('Location: /prodi/dashboard.php'); break;
    case 'operator': header('Location: /operator/dashboard.php'); break;
    default: echo 'Dashboard role belum dibuat.';
}
