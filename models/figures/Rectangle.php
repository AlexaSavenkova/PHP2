<?php

namespace app\models\figures;

class Rectangle extends Figure
{
    private $side1;
    private $side2;

    public function __construct($side1 = null, $side2 = null)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        parent::__construct();
        
    }

    // при изменении сторон автоматически будет пересчитываться площадь и периметр
    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->area = $this->getArea();
        $this->perimeter = $this->getPerimeter();
    }    

    public function getName()
    {
        return "Прямоугольник";
    }

    public function getPerimeter()
    {
        return ($this->side1 + $this->side2) * 2;
    }
    public function getArea()
    {
        return $this->side1 * $this->side2;
    }
    public function showInfo()
    {
        parent::showInfo();
        echo "Стороны {$this->side1} и {$this->side2} <br><br>";
    }
}
