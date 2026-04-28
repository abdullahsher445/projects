<?php
require_once __DIR__ . '/../../config/db.php';

function admin_logged_in(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_admin(): void
{
    if (!admin_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}

function uploadImage(array $file, string $folder): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return '';
    }

    $allowed = ['image/jpeg', 'image/png', 'image/webp'];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($file['type'], $allowed, true)) {
        throw new RuntimeException('Invalid image format. Allowed: JPG, PNG, WEBP.');
    }
    if (($file['size'] ?? 0) > $maxSize) {
        throw new RuntimeException('Image size exceeds 2MB.');
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = uniqid('img_', true) . '.' . strtolower($ext);
    $targetDir = __DIR__ . '/../../uploads/' . trim($folder, '/');
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    $targetPath = $targetDir . '/' . $name;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new RuntimeException('Failed to upload image.');
    }

    return '/uploads/' . trim($folder, '/') . '/' . $name;
}
