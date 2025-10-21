<?php
require_once __DIR__ . '/../app/auth.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $res = login_user_by_username($username, $password);
    if (!empty($res['ok'])) {
        header('Location: /index.php');
        exit;
    } else {
        $error = $res['error'] ?? 'Gagal login';
    }
}
include __DIR__ . '/../templates/header.php';
?>
<h2>Login SIAKAD NeoSync</h2>
<?php if ($error): ?><div style="color:red"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="post">
    <label>Username: <input name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
<?php include __DIR__ . '/../templates/footer.php'; ?>
