<?php

declare(strict_types=1);

namespace Chinour\Helpers\Api;

use Chinour\Helpers\QRCode\QRCodeGenerator;
use Chinour\Helpers\Utils\Color;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QrCodeEndpoint extends AbstractEndpoint
{
    public function __invoke(Request $request): Response
    {
        if (null === ($url = $request->query->get('url'))) {
            return $request->isMethod('GET')
                ? $this->getDocumentationResponse('templates/api/qrcode.md')
                : new Response(null, 204);
        }

        $qrcode = (new QRCodeGenerator())
            ->generate(
                data: (string) $url,
                color: Color::convertToRgb((string) $request->query->get('color', default: '#000000')),
                logo: (string) $request->query->get('logo')
            );

        return new Response("<img src='$qrcode' alt='QR Code' width='800' height='800'/>");
    }
}
