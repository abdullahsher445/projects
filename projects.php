<?php
$pageTitle = 'Project Showcase';
require_once __DIR__ . '/config/db.php';
$projects = $pdo->query('SELECT * FROM projects ORDER BY completed_at DESC, id DESC')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
    <div class="container">
        <h1 class="section-title reveal">Completed Work</h1>
        <div class="row g-4">
            <?php foreach ($projects as $project): ?>
            <div class="col-lg-6 reveal">
                <div class="premium-card p-3 h-100">
                    <div class="row g-3">
                        <div class="col-md-6"><img class="img-fluid rounded" src="<?= e(media_url($project['image_path'] ?: 'assets/images/project-placeholder.svg')) ?>" alt="<?= e($project['title']) ?>"></div>
                        <div class="col-md-6">
                            <?php if (!empty($project['before_image']) && !empty($project['after_image'])): ?>
                                <div class="small text-muted mb-1">Before / After</div>
                                <div class="d-flex gap-2 mb-2">
                                    <img class="img-fluid rounded" src="<?= e(media_url($project['before_image'])) ?>" alt="Before" style="width:48%">
                                    <img class="img-fluid rounded" src="<?= e(media_url($project['after_image'])) ?>" alt="After" style="width:48%">
                                </div>
                            <?php endif; ?>
                            <span class="badge badge-category"><?= e($project['category']) ?></span>
                            <h5 class="mt-2"><?= e($project['title']) ?></h5>
                            <p class="mb-0"><?= e($project['description']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
