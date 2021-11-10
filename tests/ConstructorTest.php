<?php


use PHPUnit\Framework\TestCase;
use app\models\entity\Product;

class ConstructorTest extends TestCase
{
    public function testConstructorOneArgument()
    {
        $name = "Чай";
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
        $this->assertNull($product->description);
        $this->assertNull($product->price);
    }

    public function testConstructorThreeArguments()
    {
        $name = "Чай";
        $description = "Black tee";
        $price = 100;
        $product = new Product($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }
}
