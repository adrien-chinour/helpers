<?php

declare(strict_types=1);

namespace Chinour\Helpers\QRCode;

class QRCode extends \chillerlan\QRCode\QRCode
{
    /**
     * @param integer[] $color
     * @return $this
     */
    public function setColor(array $color): static
    {
        $this->options->moduleValues = [
            1536 => $color,
            5632 => $color,
            2560 => $color,
            3072 => $color,
            3584 => $color,
            4096 => $color,
            1024 => $color,
            512 => $color,
        ];

        return $this;
    }
}
