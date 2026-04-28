<?php $current = basename($_SERVER['PHP_SELF']); ?>
<div class="admin-sidebar p-3">
    <h5 class="text-white mb-4">Admin Panel</h5>
    <?php
    $links = [
        'dashboard.php' => 'Dashboard',
        'services.php' => 'Services',
        'projects.php' => 'Projects',
        'reviews.php' => 'Reviews',
        'messages.php' => 'Messages',
        'settings.php' => 'Settings',
        'logout.php' => 'Logout',
    ];
    foreach ($links as $href => $label):
        $active = $current === $href ? 'active' : '';
    ?>
    <a class="<?= $active ?>" href="/admin/<?= $href ?>"><?= e($label) ?></a>
    <?php endforeach; ?>
</div>
