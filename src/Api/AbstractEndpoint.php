<?php

namespace Chinour\Helpers\Api;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEndpoint
{
    protected string $title = "Helpers Functions";

    public function getDocumentationResponse(string $template): Response
    {
        $parser = new \Parsedown();

        $file = __DIR__ . '/../../' . $template;

        if (! file_exists($file)) {
            throw new \RuntimeException("Template $file not found.");
        }

        $documentation = str_ends_with($file, '.md') ? $parser->parse(file_get_contents($file)) : file_get_contents($file);

        $content = <<<HTML
            <html lang="en">
                <head>
                    <title>{$this->title}</title>
                    <link rel="stylesheet" href="/assets/retro.css">
                    <script async defer data-website-id="a56ce918-a0fe-41f4-a344-4aebac8ca8c6" src="https://umami.chinour.dev/umami.js"></script>
                    <script async src="https://ackee.chinour.dev/tracker.js" data-ackee-server="https://ackee.chinour.dev" data-ackee-domain-id="e4faf2bf-682d-438f-ae39-d79b9de5aaad"></script>
                </head>
                <body>$documentation</body>
            </html>
        HTML;

        return new Response($content);
    }
}
