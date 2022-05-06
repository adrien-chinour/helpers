<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Response;

class HomeEndpoint
{
    use DocumentationRendererTrait;

    public function __invoke(): Response
    {
        return $this->getDocumentationResponse(file_get_contents(__DIR__ . '/../../templates/api/home.md'));
    }
}