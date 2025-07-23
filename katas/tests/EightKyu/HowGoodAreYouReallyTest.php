<?php

namespace Katas\Tests\EightKyu;

use Katas\EightKyu\HowGoodAreYouReally;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class HowGoodAreYouReallyTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [[2, 3], 5, true],
            [[100, 40, 34, 57, 29, 72, 57, 88], 75, true],
            [[12, 23, 34, 45, 56, 67, 78, 89, 90], 69, true],
            [[41, 75, 72, 56, 80, 82, 81, 33], 50, false],
            [[29, 55, 74, 60, 11, 90, 67, 28], 21, false],
        ];
    }

    #[TestDox('HowGoodAreYouReally::betterThanAverage')]
    #[DataProvider('dataProvider')]
    public function test(array $classPoints, int $yourPoints, bool $expected)
    {
        $this->assertEquals($expected, HowGoodAreYouReally::betterThanAverage($classPoints, $yourPoints));
    }
}
