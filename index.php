<?php

require_once 'vendor/autoload.php';

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
    ($endpoint !== null ? $endpoint($request) : new Response("<h1>404 not found :/</h1>", 404))->prepare($request)->send();
} catch (Throwable $e) {
    echo $e->getMessage();
}
