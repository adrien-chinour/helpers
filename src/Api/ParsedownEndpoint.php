<?php

namespace Chinour\Helpers\Api;

use Parsedown;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParsedownEndpoint
{
    public function __invoke(Request $request): Response
    {
        $parser = new Parsedown();

        if (($text = $request->request->get('text')) === null) {
            $text = file_get_contents(__DIR__ . '/../../templates/parsedown.md');
        }

        return new Response($parser->parse($text));
    }
}