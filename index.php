<?php

use Symfony\Component\HttpFoundation\Request;

try {
    $request = Request::createFromGlobals();
    $endpoint = new \Api\ParsedownEndpoint();
    $endpoint($request)->prepare($request)->send();
} catch (Throwable $e) {
    echo $e->getMessage();
}
