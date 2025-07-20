<?php

namespace Katas\EightKyu\CountByX;

class CountByX
{
    public static function run(int $x, int $n): array
    {
        $z = [];

        for ($i = 1; $i <= $n; $i++) {
            $z[] = $x * $i;
        }

        return $z;
    }
}