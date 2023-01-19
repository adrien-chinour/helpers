<?php

declare(strict_types=1);

namespace Chinour\Helpers\QRCode;

class LogoOptions
{
    public function __construct(
        public readonly string $logo,
        public readonly int    $logoSpaceWidth,
        public readonly int    $logoSpaceHeight,
    ) {}
}
