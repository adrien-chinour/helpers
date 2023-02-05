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
                    <link rel="icon" type="image/png" href="favicon.ico">
                    <link rel="stylesheet" href="/assets/retro.css">
                </head>
                <body>$documentation</body>
            </html>
        HTML;

        return new Response($content);
    }
}
