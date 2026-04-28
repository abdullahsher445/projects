<footer class="site-footer mt-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="text-white"><?= e(setting('business_name', 'Prestige Handyman Co.')) ?></h5>
                <p class="text-light mb-0">Reliable premium home maintenance and renovation support across Australia.</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-accent">Contact</h6>
                <p class="text-light mb-1"><i class="bi bi-envelope me-2"></i><?= e(setting('business_email', 'hello@prestigehandyman.com.au')) ?></p>
                <p class="text-light mb-1"><i class="bi bi-telephone me-2"></i><?= e(setting('business_phone', '+61 400 000 000')) ?></p>
                <p class="text-light"><i class="bi bi-geo-alt me-2"></i><?= e(setting('business_address', 'Sydney, NSW')) ?></p>
            </div>
            <div class="col-md-4">
                <h6 class="text-accent">Quick Links</h6>
                <a class="footer-link" href="<?= e(url('services.php')) ?>">Services</a><br>
                <a class="footer-link" href="<?= e(url('projects.php')) ?>">Projects</a><br>
                <a class="footer-link" href="<?= e(url('contact.php')) ?>">Get Quote</a>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <p class="mb-0 text-light">&copy; <?= date('Y') ?> <?= e(setting('business_name', 'Prestige Handyman Co.')) ?>. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= e(url('assets/js/main.js')) ?>"></script>
</body>
</html>
