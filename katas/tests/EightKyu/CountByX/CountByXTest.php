<?php

namespace Katas\Tests\EightKyu\CountByX;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Katas\EightKyu\CountByX\CountByX;

class CountByXTest extends TestCase
{
    #[TestDox('Count By X')]
    public function test()
    {
        $this->assertSame([1,2,3,4,5], CountByX::run(1, 5), "Array does not match");
        $this->assertSame([2,4,6,8,10], CountByX::run(2,5), "Array does not match");
    }
}
