<?php

use JetBrains\PhpStorm\NoReturn;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function backgroundNav($currentPage): string {
    return ($_SERVER['REQUEST_URI'] === $currentPage ) ?'bg-gray-950/50' : '';
}

#[NoReturn]
function abort($code = 404): void
{
    http_response_code($code);
    require "views/{$code}.view.php";
    die();
}

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function authorize(bool $condition, string $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}