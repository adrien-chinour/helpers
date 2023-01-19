<?php

declare(strict_types=1);

namespace Chinour\Helpers\Utils;

use Webmozart\Assert\Assert;

class Color
{
    /**
     * @param string $hexadecimal
     * @return array<int>
     */
    public static function convertToRgb(string $hexadecimal): array
    {
        list($r, $g, $b) = sscanf(str_replace('#', '', $hexadecimal), "%02x%02x%02x") ?? [null, null, null];

        Assert::integer($r);
        Assert::integer($g);
        Assert::integer($b);

        return [$r, $g, $b];
    }
}
