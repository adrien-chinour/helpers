<?php

require_once '../vendor/autoload.php';

use Chinour\Helpers\Api\HomeEndpoint;
use Chinour\Helpers\Api\ParsedownEndpoint;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$endpoints = [
    '/' => new HomeEndpoint(),
    '/parsedown' => new ParsedownEndpoint(),
];

// Initialize Whoops exception handler
$exceptionHandler = null;
if (class_exists(Whoops\Run::class)) {
    $exceptionHandler = new \Whoops\Run;
    $exceptionHandler->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $exceptionHandler->register();
}

try {
    $request = Request::createFromGlobals();
    $endpoint = $endpoints[$request->getPathInfo()];
    $response = $endpoint !== null ? $endpoint($request) : new Response("<h1>404 not found :/</h1>", 404);
    $response->headers->set('Access-Control-Allow-Origin', ['https://umami.chinour.dev', 'https://ackee.chinour.dev']);
    $response->prepare($request)->send();
} catch (Throwable $exception) {
    $exceptionHandler?->handleException($exception);
    (new Response("<h1>C cassé :(</h1>", 500))->prepare($request)->send();
}

