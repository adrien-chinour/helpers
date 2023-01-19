<?php

declare(strict_types=1);

namespace Chinour\Helpers\QRCode;

use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRImage;
use chillerlan\Settings\SettingsContainerInterface;

class QRImageWithLogo extends QRImage
{
    public function __construct(
        protected LogoOptions      $logoOptions,
        SettingsContainerInterface $options,
        QRMatrix                   $matrix
    )
    {
        parent::__construct($options, $matrix);
    }

    public function dump(string $file = null)
    {
        $this->matrix->setLogoSpace($this->logoOptions->logoSpaceWidth, $this->logoOptions->logoSpaceHeight);

        // there's no need to save the result of dump() into $this->image here
        parent::dump($file);

        $im = imagecreatefrompng($this->logoOptions->logo);

        // get logo image size
        $w = imagesx($im);
        $h = imagesy($im);

        // set new logo size, leave a border of 1 module (no proportional resize/centering)
        $lw = ($this->logoOptions->logoSpaceWidth - 2) * $this->options->scale;
        $lh = ($this->logoOptions->logoSpaceHeight - 2) * $this->options->scale;

        // get the qrcode size
        $ql = $this->matrix->size() * $this->options->scale;

        // scale the logo and copy it over. done!
        imagecopyresampled($this->image, $im, (int)(($ql - $lw) / 2), (int)(($ql - $lh) / 2), 0, 0, $lw, $lh, $w, $h);

        $imageData = $this->dumpImage();

        if ($file !== null) {
            $this->saveToFile($imageData, $file);
        }

        if ($this->options->imageBase64) {
            $imageData = 'data:image/' . $this->options->outputType . ';base64,' . base64_encode($imageData);
        }

        return $imageData;
    }
}
