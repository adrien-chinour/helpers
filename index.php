<?php

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$endpoint = new \Api\ParsedownEndpoint();
$endpoint($request)->prepare($request)->send();
