<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Response;

trait DocumentationRendererTrait
{
    public function getDocumentationResponse(string $documentation): Response
    {
        $parser = new \Parsedown();
        $documentation = $parser->parse($documentation);

        $content = <<<HTML
            <html lang="en">
                <head>
                    <title>Helpers Functions</title>
                    <link rel="stylesheet" type="text/css" href="/assets/retro.css">
                </head>
                <body>$documentation</body>
            </html>
        HTML;

        return new Response($content);
    }
}