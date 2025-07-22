<?php

namespace Katas\EightKyu;

class HowGoodAreYouReally
{
    public static function betterThanAverage(array $classPoints, int $yourPoints): bool
    {
        $classMedia = array_sum($classPoints) / count($classPoints);

        return $yourPoints > $classMedia;
    }
}