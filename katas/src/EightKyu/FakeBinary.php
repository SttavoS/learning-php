<?php

namespace Katas\EightKyu;

class FakeBinary
{
    public static function run(string $s): string
    {
        $explodedString = str_split($s);

        $fakeBinary = array_map(fn($str) => intval($str) >= 5 ? '1' : '0', $explodedString);

        return implode($fakeBinary);
    }
}