<?php

use PHPUnit\Framework\TestCase;
use app\models\entity\Product;

class ProductTest extends TestCase
{
    protected $fixture;
    protected function setUp():void
    {
        $this->fixture = new Product();
    }
    protected function tearDown():void
    {
        $this->fixture = NULL;
    }


    public function testProps()
    {
        $this->assertIsArray($this->fixture->props);

        foreach ($this->fixture->props as $key => $value) {
            $this->assertFalse($this->fixture->props[$key]);
        }
    }

    /**
     * @dataProvider providerSet
     */
    public function testSet($a, $b)
    {

        $this->fixture->$a = $b;
        $this->assertTrue($this->fixture->props[$a]);

    }
    public function providerSet()
    {
        return [
            ['name', 'new name'],
            ['description', 'new description'],
            ['price', 120]
        ];

    }

}