<?php

namespace app\models\figures;

class Circle extends Figure
{
    public $radius;
    const PI = 3.14;

    public function __construct($radius = null)
    {
        $this->radius = $radius;
    }

    public function GetPerimeter()
    {
         return 2 * $this->radius * static::PI;       
    }
    public function GetArea()
    {
        return pow($this->radius, 2) * static::PI;
    }
    public function GetInfo()
    {
        return "Круг с радиусом {$this->radius}";
    }
}


