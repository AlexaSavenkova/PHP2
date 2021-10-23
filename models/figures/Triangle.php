<?php

namespace app\models\figures;

class Triangle extends Figure
{
    private $side1;
    private $side2;
    private $angle;

    public function __construct($side1 = null, $side2 = null, $angle = null)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->angle = $angle;
        parent::__construct();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->area = $this->getArea();
        $this->perimeter = $this->getPerimeter();
    }    

    public function getName()
    {
        return "Треугольник";
    }

    public function getPerimeter()
    {
        $side3 = sqrt(pow($this->side1, 2) + pow($this->side2, 2) - 2 * $this->side1 * $this->side2 * cos(deg2rad($this->angle)));
        return $this->side1 + $this->side2 + $side3;
    }
    public function getArea()
    {
        return 0.5 * $this->side1 * $this->side2 * sin(deg2rad($this->angle));
    }
    public function showInfo()
    {
        parent::showInfo();
        echo "Cтороны {$this->side1} и {$this->side2} и угол между ними {$this->angle} градусов <br><br>";
    }
}
