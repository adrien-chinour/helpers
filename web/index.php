<?php

require_once '../vendor/autoload.php';

use Chinour\Helpers\Api as Api;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$endpoints = [
    '/' => new Api\HomeEndpoint(),
    '/parsedown' => new Api\ParsedownEndpoint(),
    '/qrcode' => new Api\QrCodeEndpoint(),
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

    $response = (new JsonResponse([
        'exception' => $exception->getMessage(),
    ]));
    $response->prepare($request)->send();
}

