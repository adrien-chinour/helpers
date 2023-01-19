<?php

declare(strict_types=1);

namespace Chinour\Helpers\Utils;

class Color
{
    public static function convertToRgb(string $hexadecimal): array
    {
        return sscanf(str_replace('#', '', $hexadecimal), "%02x%02x%02x");
    }
}
