<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParsedownEndpoint
{
    use DocumentationRendererTrait;

    public function __invoke(Request $request): Response
    {
        if (($text = $request->request->get('text')) === null) {
            return $this->getDocumentationResponse(file_get_contents(__DIR__ . '/../../templates/api/parsedown.md'));
        }

        return new Response((new \Parsedown())->parse($text));
    }
}