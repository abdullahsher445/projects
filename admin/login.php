<?php
require_once __DIR__ . '/../config/db.php';
if (!empty($_SESSION['admin_id'])) {
    header('Location: /admin/dashboard.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: /admin/dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
</head><body class="admin-bg">
<div class="container py-5"><div class="row justify-content-center"><div class="col-md-5">
<div class="card premium-card p-4"><h3 class="mb-3">Admin Login</h3>
<?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<div class="mb-3"><label>Username</label><input class="form-control" name="username" required></div>
<div class="mb-3"><label>Password</label><input type="password" class="form-control" name="password" required></div>
<button class="btn btn-accent w-100">Login</button>
</form></div></div></div></div>
</body></html>
