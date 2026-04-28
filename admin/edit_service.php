<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare('SELECT * FROM services WHERE id = ?');
$stmt->execute([$id]);
$service = $stmt->fetch();
if (!$service) { die('Service not found.'); }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = trim($_POST['title'] ?? '');
        $short = trim($_POST['short_description'] ?? '');
        $details = trim($_POST['details'] ?? '');
        $image = $service['image_path'];
        if (!empty($_FILES['image']['name'])) $image = uploadImage($_FILES['image'], 'services');
        $upd = $pdo->prepare('UPDATE services SET title=?, short_description=?, details=?, image_path=? WHERE id=?');
        $upd->execute([$title, $short, $details, $image, $id]);
        header('Location: /admin/services.php'); exit;
    } catch (Throwable $t) { $error = $t->getMessage(); }
}
$pageHeading = 'Edit Service';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" class="premium-card p-4">
<div class="mb-3"><label>Title</label><input class="form-control" name="title" value="<?= e($service['title']) ?>" required></div>
<div class="mb-3"><label>Short Description</label><textarea class="form-control" name="short_description" required><?= e($service['short_description']) ?></textarea></div>
<div class="mb-3"><label>Details</label><textarea class="form-control" name="details" rows="6" required><?= e($service['details']) ?></textarea></div>
<div class="mb-3"><label>Image</label><input type="file" class="form-control" name="image" accept="image/*"></div>
<button class="btn btn-accent">Update</button></form>
</div></div></div></body></html>
