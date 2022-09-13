<?php

namespace App\Service;

final class ProductColors implements ProductColorsInterface
{
    public const COLOR_RED = 'red';
    public const COLOR_GREEN = 'green';
    public const COLOR_BLUE = 'blue';

    private static array $codesWithLabels = [
        self::COLOR_RED => 'Czerwony',
        self::COLOR_GREEN => 'Zielony',
        self::COLOR_BLUE => 'Niebieski',
    ];

    public function getCodes(): array
    {
        return array_keys(self::$codesWithLabels);
    }

    public function getLabel($code): string
    {
        return self::$codesWithLabels[$code];
    }
}
