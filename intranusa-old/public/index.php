<?php

use Illuminate\Foundation\Application;

require __DIR__.'/../vendor/autoload.php';

$app = Application::configure(basePath: dirname(__DIR__))->create();

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);
