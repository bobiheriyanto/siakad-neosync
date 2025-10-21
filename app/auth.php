<?php
// Simple role-based auth helpers
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/db.php';

function current_user() {
    return $_SESSION['user'] ?? null;
}

function login_user_by_username($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :u LIMIT 1");
    $stmt->execute([':u' => $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        // check BAUK lock: if user is student and locked, prevent login
        if ($user['role'] === 'mahasiswa') {
            $stmt2 = $pdo->prepare("SELECT locked_until FROM payments_lock WHERE student_user_id = :uid LIMIT 1");
            $stmt2->execute([':uid' => $user['id']]);
            $lock = $stmt2->fetch();
            if ($lock && strtotime($lock['locked_until']) > time()) {
                return ['error' => 'Akses dibatasi karena tunggakan pembayaran.'];
            }
        }
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'person_id' => $user['person_id']
        ];
        return ['ok' => true];
    }
    return ['error' => 'Username atau password salah'];
}

function require_role($role) {
    $u = current_user();
    if (!$u || $u['role'] !== $role) {
        header('Location: /login.php');
        exit;
    }
}
