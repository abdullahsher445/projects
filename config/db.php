<?php
/**
 * Database connection and global helper functions.
 */

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbHost = 'localhost';
$dbName = 'handyman_premium';
$dbUser = 'root';
$dbPass = '';
$dbCharset = 'utf8mb4';

$dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbCharset}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {
    die('Database connection failed. Please check config/db.php settings.');
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function setting(string $key, string $default = ''): string
{
    global $pdo;
    static $settings = null;

    if ($settings === null) {
        $stmt = $pdo->query('SELECT setting_key, setting_value FROM settings');
        $settings = [];
        foreach ($stmt as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
    }

    return $settings[$key] ?? $default;
}
