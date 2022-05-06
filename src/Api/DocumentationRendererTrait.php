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
                    <script async defer data-website-id="a56ce918-a0fe-41f4-a344-4aebac8ca8c6" src="https://umami.chinour.dev/umami.js"></script>
                </head>
                <body>$documentation</body>
            </html>
        HTML;

        return new Response($content);
    }
}