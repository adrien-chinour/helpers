<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Response;

class HomeEndpoint extends AbstractEndpoint
{
    public function __invoke(): Response
    {
        return $this->getDocumentationResponse('templates/api/home.md');
    }
}