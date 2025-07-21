<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__).'app'); // BASE_PATH = project-root

require '/app/vendor/autoload.php';
$config = require '/app/src/config.php';

$app = new App\Core\Application($config);
$app->run();
