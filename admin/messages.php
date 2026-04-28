<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    $id = (int)($_POST['message_id'] ?? 0);
    $action = $_POST['action'] ?? '';
    if ($action === 'read') $pdo->prepare('UPDATE contact_messages SET is_read=1 WHERE id=?')->execute([$id]);
    if ($action === 'unread') $pdo->prepare('UPDATE contact_messages SET is_read=0 WHERE id=?')->execute([$id]);
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
}
if (isset($_GET['delete'])) {
    $pdo->prepare('DELETE FROM contact_messages WHERE id=?')->execute([(int)$_GET['delete']]);
    header('Location: /admin/messages.php'); exit;
}
$messages = $pdo->query('SELECT * FROM contact_messages ORDER BY created_at DESC')->fetchAll();
$pageHeading = 'Contact Messages';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__.'/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__.'/includes/topbar.php'; ?>
<table class="table table-striped bg-white"><tr><th>Name</th><th>Contact</th><th>Service</th><th>Message</th><th>Status</th><th>Actions</th></tr>
<?php foreach($messages as $m): ?><tr><td><?=e($m['name'])?></td><td><?=e($m['email'])?><br><?=e($m['phone'])?></td><td><?=e($m['service_type'])?></td><td><?=e($m['message'])?></td><td><?= $m['is_read']?'Read':'Unread' ?></td><td>
<a href="#" class="btn btn-sm btn-dark mark-message" data-id="<?= (int)$m['id'] ?>" data-action="<?= $m['is_read'] ? 'unread' : 'read' ?>"><?= $m['is_read'] ? 'Mark Unread' : 'Mark Read' ?></a>
<a class="btn btn-sm btn-danger" href="?delete=<?= (int)$m['id'] ?>" onclick="return confirm('Delete message?')">Delete</a></td></tr><?php endforeach; ?>
</table></div></div></div><script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script><script src="/assets/js/main.js"></script></body></html>
