<?php
$pageTitle = 'Our Services';
require_once __DIR__ . '/config/db.php';
$services = $pdo->query('SELECT * FROM services ORDER BY id DESC')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
    <div class="container">
        <h1 class="section-title reveal">Handyman Services</h1>
        <div class="row g-4">
            <?php foreach ($services as $service): ?>
            <div class="col-md-4 reveal">
                <div class="card premium-card h-100">
                    <img src="<?= e(media_url($service['image_path'] ?: 'assets/images/service-placeholder.svg')) ?>" class="card-img-top" alt="<?= e($service['title']) ?>">
                    <div class="card-body">
                        <h5><?= e($service['title']) ?></h5>
                        <p><?= e($service['short_description']) ?></p>
                        <button class="btn btn-sm btn-accent" data-bs-toggle="collapse" data-bs-target="#service-<?= (int)$service['id'] ?>">Details</button>
                        <div class="collapse mt-2" id="service-<?= (int)$service['id'] ?>"><small><?= nl2br(e($service['details'])) ?></small></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
