<?php

//phpinfo();

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('{controller}/{action}');
$router->add('', ['controller' => 'Home', 'action' => 'index']);

//$router->dispatch($_SERVER['QUERY_STRING']);

if (array_key_exists('QUERY_STRING', $_SERVER)) {
    $uri = $_SERVER['QUERY_STRING'];
} else {
    $uri = '';
}

$router->dispatch($uri);
