<?php

// Specify content type for API response.
header('Content-Type: application/json');

// Define the path to the application’s root directory.
define('LARAVEL_START', microtime(true));

// Load Composer's autoloader.
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the application.
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Create the kernel for handling requests.
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capture and handle the request.
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Send the response back in JSON format.
$response->send();

$kernel->terminate($request, $response);