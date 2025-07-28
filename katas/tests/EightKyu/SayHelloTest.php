<?php

namespace Katas\Tests\EightKyu;

use Katas\EightKyu\SayHello;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    #[TestDox('SayHello::hello')]
    #[DataProvider('dataProvider')]
    public function test(string $input, string $expected)
    {
        $this->assertSame(
            $expected,
            SayHello::hello($input),
            "SayHello::hello('$input') returned an incorrect answer."
        );
    }

    public static function dataProvider()
    {
        return [
            ['Mr. Spock', 'Hello, Mr. Spock'],
            ['Captain Kirk', 'Hello, Captain Kirk'],
            ['Liutenant Uhura', 'Hello, Liutenant Uhura'],
            ['Dr. McCoy', 'Hello, Dr. McCoy']
        ];
    }
}
