<?php

namespace Adrien\MdToHtml\Api;

use Parsedown;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParsedownEndpoint
{
    public function __invoke(Request $request): Response
    {
        $parser = new Parsedown();
        return new Response($parser->parse($request->request->get('text')));
    }
}