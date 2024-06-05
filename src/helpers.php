<?php

// use this function only at routes.php
function route($uri, $callback)
{
    $requestUri = $_SERVER['REQUEST_URI'];

    if (preg_match("#^{$uri}$#", $requestUri, $matches)) {
        array_shift($matches); // Remove the full match from the beginning
        call_user_func_array($callback, $matches);
        exit();
    }
}

function view($view, $data = [])
{
    extract($data);

    $viewFile = __DIR__ . "/Views/{$view}.php";

    if (file_exists($viewFile)) {
        include $viewFile; // NOSONAR
    } else {
        echo "View file not found: {$viewFile}";
    }
}

function truncateString($string, $maxLength = 50) {
    if (strlen($string) > $maxLength) {
        return substr($string, 0, $maxLength) . '...';
    }
    return $string;
}