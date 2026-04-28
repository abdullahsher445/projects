<?php
$pageTitle = 'About Us';
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
    <div class="container reveal">
        <h1 class="section-title">About <?= e(setting('business_name', 'Prestige Handyman Co.')) ?></h1>
        <p>We are a premium Australian handyman team focused on reliable repairs, home upgrades, and preventative maintenance. Our licensed professionals are committed to quality craftsmanship and respectful service.</p>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
