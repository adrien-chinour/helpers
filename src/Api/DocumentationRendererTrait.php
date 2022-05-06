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
                    <script async src="https://ackee.chinour.dev/tracker.js" data-ackee-server="https://ackee.chinour.dev" data-ackee-domain-id="e4faf2bf-682d-438f-ae39-d79b9de5aaad"></script>
                </head>
                <body>$documentation</body>
            </html>
        HTML;

        return new Response($content);
    }
}