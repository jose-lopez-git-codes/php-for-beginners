<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require('routes.php');

routeToController($uri, $routes);