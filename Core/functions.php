<?php

use Core\Response;
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
    require base_path("views/{$code}.view.php");
    die();
}

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
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

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/$path");
}

function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return \Core\Session::get('old')[$key] ?? $default;
}