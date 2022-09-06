<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParsedownEndpoint extends AbstractEndpoint
{
    public function __invoke(Request $request): Response
    {
        if (null === ($text = $request->request->get('text'))) {
            return $request->isMethod('GET')
                ? $this->getDocumentationResponse('templates/api/parsedown.md')
                : new Response(null, 204);
        }

        return new Response((new \Parsedown())->parse($text));
    }
}