<?php
require_once __DIR__ . '/../config/db.php';
$pageTitle = $pageTitle ?? setting('business_name', 'Prestige Handyman Co.');
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="Premium handyman and home maintenance services.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark premium-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/index.php">
            <i class="bi bi-tools me-2"></i><?= e(setting('business_name', 'Prestige Handyman Co.')) ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <?php
                $menu = [
                    'index.php' => 'Home',
                    'about.php' => 'About',
                    'services.php' => 'Services',
                    'projects.php' => 'Projects',
                    'contact.php' => 'Contact'
                ];
                foreach ($menu as $file => $label):
                    $active = $currentPage === $file ? 'active' : '';
                ?>
                    <li class="nav-item"><a class="nav-link <?= $active ?>" href="/<?= $file ?>"><?= e($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
