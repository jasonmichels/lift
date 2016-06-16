<?php declare(strict_types=1);
require_once __DIR__ . '/../bootstrap/autoload.php';

/**
 * Load the app object
 */
$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Load the routes
 */
$routes = require_once __DIR__ . '/../src/routes.php';

/**
 * Run the routes
 */
$app->run($routes);