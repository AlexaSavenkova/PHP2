<?php

namespace app\models\figures;

class Triangle extends Figure
{
    public $side1;
    public $side2;
    public $angle;

    public function __construct($side1 = null, $side2 = null, $angle = null)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->angle = $angle;
    }
    public function GetPerimeter()
    {
        $side3 = sqrt(pow($this->side1, 2) + pow($this->side2, 2) - 2 * $this->side1 * $this->side2 * cos(deg2rad($this->angle)));
        return $this->side1 + $this->side2 + $side3;
    }
    public function GetArea()
    {
        return 0.5 * $this->side1 * $this->side2 * sin(deg2rad($this->angle));
    }
    public function GetInfo()
    {
        return "Треугольник со сторонами {$this->side1} и {$this->side2} и углом {$this->angle} градусов между ними";
    }
}
