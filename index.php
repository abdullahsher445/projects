<?php
$pageTitle = 'Premium Handyman Services';
require_once __DIR__ . '/config/db.php';
$services = $pdo->query('SELECT * FROM services ORDER BY id DESC LIMIT 6')->fetchAll();
$projects = $pdo->query('SELECT * FROM projects ORDER BY completed_at DESC LIMIT 6')->fetchAll();
$reviews = $pdo->query('SELECT * FROM reviews WHERE is_active = 1 ORDER BY id DESC LIMIT 3')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container text-center reveal">
        <h1 class="display-4 fw-bold">Premium Handyman & Home Maintenance</h1>
        <p class="lead">Trusted workmanship, fast response, and polished finishes for modern Australian homes.</p>
        <a href="<?= e(url('contact.php')) ?>" class="btn btn-accent btn-lg px-4">Request a Quote</a>
    </div>
</section>
<section class="py-5 reveal">
    <div class="container">
        <h2 class="section-title">Business Intro</h2>
        <p>We deliver high-end property care including repairs, carpentry, painting, and ongoing maintenance plans for homeowners and property managers.</p>
    </div>
</section>
<section class="py-5 bg-light reveal">
    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <div class="row g-4">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="card premium-card h-100">
                        <img src="<?= e(media_url($service['image_path'] ?: 'assets/images/service-placeholder.svg')) ?>" class="card-img-top" alt="<?= e($service['title']) ?>">
                        <div class="card-body">
                            <h5><?= e($service['title']) ?></h5>
                            <p><?= e($service['short_description']) ?></p>
                            <a href="<?= e(url('services.php')) ?>" class="btn btn-outline-dark btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="py-5 reveal">
    <div class="container">
        <h2 class="section-title">Why Choose Us</h2>
        <div class="row g-4">
            <div class="col-md-3"><div class="premium-card p-4 text-center"><i class="bi bi-shield-check fs-1 text-accent"></i><h6 class="mt-2">Insured & Reliable</h6></div></div>
            <div class="col-md-3"><div class="premium-card p-4 text-center"><i class="bi bi-clock-history fs-1 text-accent"></i><h6 class="mt-2">On-Time Delivery</h6></div></div>
            <div class="col-md-3"><div class="premium-card p-4 text-center"><i class="bi bi-stars fs-1 text-accent"></i><h6 class="mt-2">Premium Finish</h6></div></div>
            <div class="col-md-3"><div class="premium-card p-4 text-center"><i class="bi bi-chat-square-text fs-1 text-accent"></i><h6 class="mt-2">Transparent Quotes</h6></div></div>
        </div>
    </div>
</section>
<section class="py-5 bg-light reveal">
    <div class="container">
        <h2 class="section-title">Recent Projects</h2>
        <div class="row g-4">
            <?php foreach ($projects as $project): ?>
            <div class="col-md-4">
                <div class="premium-card card h-100">
                    <img src="<?= e(media_url($project['image_path'] ?: 'assets/images/project-placeholder.svg')) ?>" class="card-img-top" alt="<?= e($project['title']) ?>">
                    <div class="card-body">
                        <span class="badge badge-category"><?= e($project['category']) ?></span>
                        <h5 class="mt-2"><?= e($project['title']) ?></h5>
                        <p><?= e($project['description']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="py-5 reveal">
    <div class="container">
        <h2 class="section-title">Customer Reviews</h2>
        <div class="row g-4">
            <?php foreach ($reviews as $review): ?>
                <div class="col-md-4">
                    <div class="premium-card p-4 h-100">
                        <p class="mb-1">“<?= e($review['review_text']) ?>”</p>
                        <strong><?= e($review['customer_name']) ?></strong>
                        <div class="text-warning"><?= str_repeat('★', (int)$review['rating']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="container mb-5 reveal">
    <div class="cta-section p-5 text-center">
        <h3>Need urgent home maintenance support?</h3>
        <p>Let’s schedule your job and deliver premium results.</p>
        <a href="<?= e(url('contact.php')) ?>" class="btn btn-accent">Contact Us Today</a>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
