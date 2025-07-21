<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getInstance(array $config): PDO
    {
        if (self::$instance === null) {
            if ($config['dbdriver'] === 'mysql') {
                $dsn = "mysql:host={$config['dbhost']};dbname={$config['dbname']};charset=utf8mb4";
                $user = $config['dbuser'] ?? '';
                $pass = $config['dbpass'] ?? '';
                try {
                    self::$instance = new PDO($dsn, $user, $pass);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("MySQL Connection failed: " . $e->getMessage());
                }
            } else {
                $dsn = "sqlite:" . BASE_PATH . "/src/data/{$config['db']}";
                try {
                    self::$instance = new PDO($dsn);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("SQLite Connection failed: " . $e->getMessage());
                }
            }
        }
        return self::$instance;
    }

    private function __clone() {}
    public function __wakeup() {}
}
