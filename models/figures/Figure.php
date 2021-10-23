<?php

namespace app\models\figures;

abstract class Figure
{
    public $area;
    public $perimeter;

    public function __construct()
    {
        $this->area = $this->getArea();
        $this->perimeter = $this->getPerimeter();
    }

    abstract public function getPerimeter();
    abstract public function getArea();
    abstract public function getName();

    public function showInfo()
    {
        echo "Фигура: {$this->getName()}<br>";
        echo "Площадь: {$this->area}<br>";
        echo "Периметр: {$this->perimeter}<br>";
    }
}
