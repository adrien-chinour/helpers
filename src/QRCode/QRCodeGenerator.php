<?php

declare(strict_types=1);

namespace Chinour\Helpers\QRCode;

use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRImage;
use chillerlan\QRCode\QROptions;

class QRCodeGenerator
{
    public function generate(string $data, array $color = [0, 0, 0], ?string $logo = null): string
    {
        $options = new QROptions([
            'eccLevel' => QRCode::ECC_H,
            'imageBase64' => true,
            'scale' => 20,
            'version' => 7,
        ]);
        $qrcode = (new QRCode($options))->setColor($color);

        return $this->renderImage($options, $qrcode->getMatrix($data), $logo)->dump();
    }

    protected function renderImage(QROptions $options, QRMatrix $matrix, ?string $logo = null): QRImage
    {
        if ($logo === null) {
            return new QRImage($options, $matrix);
        }

        file_put_contents($filename = sys_get_temp_dir() . '/logo.png', file_get_contents($logo));

        return new QRImageWithLogo(new LogoOptions($filename, 17, 17), $options, $matrix);
    }
}
