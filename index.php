<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__)); // BASE_PATH = project-root

require BASE_PATH . '/vendor/autoload.php';
$config = require BASE_PATH . '/src/config.php';

$app = new App\Core\Application($config);
$app->run();
