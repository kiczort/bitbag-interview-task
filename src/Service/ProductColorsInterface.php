<?php

namespace App\Service;

interface ProductColorsInterface
{
    /**
     * @return array|string[]
     */
    public function getCodes(): array;

    public function getLabel($code): string;
}
