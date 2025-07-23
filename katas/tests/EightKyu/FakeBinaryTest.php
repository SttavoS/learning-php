<?php

namespace Katas\Tests\EightKyu;

use Katas\EightKyu\FakeBinary;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class FakeBinaryTest extends TestCase
{
    #[TestDox('FakeBinary::run')]
    #[DataProvider('dataProvider')]
    public function test(string $s, string $expected)
    {
        $this->assertSame($expected, FakeBinary::run($s), "FakeBinary::run('$s') returned an incorrect value.");
    }

    public static function dataProvider(): array
    {
        return [
            ['45385593107843568', '01011110001100111'],
            ['509321967506747', '101000111101101'],
            ['366058562030849490134388085', '011011110000101010000011011']
        ];
    }
}
