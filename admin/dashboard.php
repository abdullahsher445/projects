<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$pageHeading = 'Dashboard Overview';
$totals = [
    'services' => $pdo->query('SELECT COUNT(*) FROM services')->fetchColumn(),
    'projects' => $pdo->query('SELECT COUNT(*) FROM projects')->fetchColumn(),
    'reviews' => $pdo->query('SELECT COUNT(*) FROM reviews')->fetchColumn(),
    'messages' => $pdo->query('SELECT COUNT(*) FROM contact_messages')->fetchColumn(),
];
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head>
<body class="admin-bg"><div class="container-fluid"><div class="row">
<div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div>
<div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<div class="row g-4">
<?php foreach ($totals as $key => $value): ?>
<div class="col-md-3"><div class="premium-card p-4"><h6 class="text-uppercase text-muted"><?= e($key) ?></h6><h2><?= (int)$value ?></h2></div></div>
<?php endforeach; ?>
</div>
</div></div></div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></body></html>
