<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
if (isset($_GET['delete'])) {
    $pdo->prepare('DELETE FROM projects WHERE id=?')->execute([(int)$_GET['delete']]);
    header('Location: /admin/projects.php'); exit;
}
$projects = $pdo->query('SELECT * FROM projects ORDER BY id DESC')->fetchAll();
$pageHeading = 'Manage Projects';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="<?= e(url('assets/css/style.css')) ?>" rel="stylesheet"></head>
<body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<a href="<?= e(url('admin/add_project.php')) ?>" class="btn btn-accent mb-3">Add Project</a>
<table class="table table-striped bg-white"><tr><th>Image</th><th>Title</th><th>Category</th><th>Actions</th></tr>
<?php foreach($projects as $p): ?><tr><td><img class="thumb" src="<?= e(media_url($p['image_path'] ?: 'assets/images/project-placeholder.svg')) ?>"></td><td><?= e($p['title']) ?></td><td><?= e($p['category']) ?></td><td><a class="btn btn-sm btn-dark" href="<?= e(url('admin/edit_project.php')) ?>?id=<?= (int)$p['id'] ?>">Edit</a> <a class="btn btn-sm btn-danger" href="?delete=<?= (int)$p['id'] ?>" onclick="return confirm('Delete project?')">Delete</a></td></tr><?php endforeach; ?>
</table></div></div></div></body></html>
