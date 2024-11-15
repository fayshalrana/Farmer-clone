<?php

// Set content type for HTML responses.
header('Content-Type: text/html; charset=UTF-8');

// Define the start time for the application.
define('LARAVEL_START', microtime(true));

// Register Composer's autoload.
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the application.
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Create the kernel to handle requests.
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capture the request and send the response.
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);