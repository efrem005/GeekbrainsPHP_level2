<?php


namespace app\tests;

use app\models\entities\product\Product;
use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase
{
    /**
     * @dataProvider providerProduct
     */
    public function testProduct($title)
    {
        $product = new Product($title);
        $this->assertEquals($title, $product->title);
    }

    public function testProductProps()
    {
        $product = new Product();
        $this->assertIsArray($product->props);
        foreach ($product->props as $key => $value){
            $this->assertEquals(false, $product->props[$key]);
        }
    }

    public function testProductNameClass()
    {
        $nameClass = Product::class;
        $appPos = strpos($nameClass, "app\\");
        $this->assertIsNotBool($appPos);
    }

    public function providerProduct(): array
    {
        return [
            ["Арбуз"],
            ['Ананас'],
            ['Банан']
        ];
    }
}