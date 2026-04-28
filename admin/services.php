<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare('DELETE FROM services WHERE id = ?');
    $stmt->execute([(int)$_GET['delete']]);
    header('Location: /admin/services.php');
    exit;
}
$services = $pdo->query('SELECT * FROM services ORDER BY id DESC')->fetchAll();
$pageHeading = 'Manage Services';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head>
<body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<a href="/admin/add_service.php" class="btn btn-accent mb-3">Add Service</a>
<div class="table-responsive"><table class="table table-striped bg-white"><tr><th>Image</th><th>Title</th><th>Description</th><th>Actions</th></tr>
<?php foreach ($services as $s): ?><tr><td><img class="thumb" src="<?= e($s['image_path'] ?: '/assets/images/service-placeholder.svg') ?>"></td><td><?= e($s['title']) ?></td><td><?= e($s['short_description']) ?></td><td><a class="btn btn-sm btn-dark" href="/admin/edit_service.php?id=<?= (int)$s['id'] ?>">Edit</a> <a class="btn btn-sm btn-danger" href="?delete=<?= (int)$s['id'] ?>" onclick="return confirm('Delete service?')">Delete</a></td></tr><?php endforeach; ?>
</table></div></div></div></div></body></html>
