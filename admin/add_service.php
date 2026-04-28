<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = trim($_POST['title'] ?? '');
        $short = trim($_POST['short_description'] ?? '');
        $details = trim($_POST['details'] ?? '');
        if ($title === '' || $short === '' || $details === '') {
            throw new RuntimeException('All fields are required.');
        }
        $image = uploadImage($_FILES['image'] ?? [], 'services');
        $stmt = $pdo->prepare('INSERT INTO services (title, short_description, details, image_path) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $short, $details, $image]);
        header('Location: /admin/services.php');
        exit;
    } catch (Throwable $t) { $error = $t->getMessage(); }
}
$pageHeading = 'Add Service';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" class="premium-card p-4">
<div class="mb-3"><label>Title</label><input class="form-control" name="title" required></div>
<div class="mb-3"><label>Short Description</label><textarea class="form-control" name="short_description" required></textarea></div>
<div class="mb-3"><label>Details</label><textarea class="form-control" name="details" rows="6" required></textarea></div>
<div class="mb-3"><label>Image</label><input type="file" class="form-control" name="image" accept="image/*"></div>
<button class="btn btn-accent">Save</button></form>
</div></div></div></body></html>
