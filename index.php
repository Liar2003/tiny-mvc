<?php

declare(strict_types=1);

// Project root
define('BASE_PATH', dirname(__DIR__));

// Autoloader
require '/vendor/autoload.php';



// Load configuration
$config = require  '/src/config.php';

// Instantiate and run the application
$app = new App\Core\Application($config);
$app->run();
