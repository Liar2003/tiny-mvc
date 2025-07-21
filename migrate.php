<?php
// migrate.php - Simple migration runner for TinyMVC

define('BASE_PATH', __DIR__);

require BASE_PATH . '/src/Core/Database.php';

use App\Core\Database;

$config = require BASE_PATH . '/src/config.php';
$pdo = Database::getInstance($config);

// Migration: create contact_records table
if ($config['dbdriver'] === 'mysql') {
    $sql = "CREATE TABLE IF NOT EXISTS contact_records (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
} else {
    $sql = "CREATE TABLE IF NOT EXISTS contact_records (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );";
}

try {
    $pdo->exec($sql);
    echo "Migration successful: contact_records table created.\n";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
}
