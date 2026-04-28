<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><?= e($pageHeading ?? 'Admin') ?></h3>
    <span class="badge bg-dark">Logged in as <?= e($_SESSION['admin_username'] ?? 'Admin') ?></span>
</div>
