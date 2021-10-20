<?php

namespace app\models\figures;

class Rectangle extends Figure
{
    public $side1;
    public $side2;

    public function __construct($side1 = null, $side2 = null)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
    }
    public function GetPerimeter()
    {
        return ($this->side1 + $this->side2) * 2;
    }
    public function GetArea()
    {
        return $this->side1 * $this->side2;
    }
    public function GetInfo()
    {
        return "Прямоугольник со сторонами {$this->side1} и {$this->side2}";
    }
}
