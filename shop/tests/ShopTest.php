<?php


namespace app\tests;

use PHPUnit\Framework\TestCase;


class ShopTest extends TestCase
{
    /**
     * @dataProvider providerFactorial
     */
    public function testAdd($e, $x, $y)
    {
        $this->assertEquals($e, $x + $y);
    }

    public function providerFactorial()
    {
        return [
          [3, 1, 2],
          [7, 5, 2],
          [4, 2, 2]
        ];
    }
}