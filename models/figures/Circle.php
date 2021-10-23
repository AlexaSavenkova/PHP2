<?php

namespace app\models\figures;

class Circle extends Figure
{
    private $radius;
    const PI = 3.14;

    public function __construct($radius = null)
    {
        $this->radius = $radius;
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
        return "Круг";
    }
    public function getPerimeter()
    {
         return 2 * $this->radius * static::PI;       
    }
    public function getArea()
    {
        return pow($this->radius, 2) * static::PI;
    }
    public function showInfo()
    {
        parent::showInfo();
        echo "Радиус {$this->radius}<br><br>";
    }
}


