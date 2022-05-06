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

try {
    $request = Request::createFromGlobals();
    $endpoint = $endpoints[$request->getPathInfo()];
    $response = $endpoint !== null ? $endpoint($request) : new Response("<h1>404 not found :/</h1>", 404);
    $response->headers->set('Access-Control-Allow-Origin', 'https://umami.chinour.dev');
    $response->prepare($request)->send();
} catch (Throwable $e) {
    echo $e->getMessage();
}
