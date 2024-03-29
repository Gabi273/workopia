<?php
include('../helpers.php');
require basePath('Router.php');
include(basePath('Database.php'));

// Instantiate the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current uri and http
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);