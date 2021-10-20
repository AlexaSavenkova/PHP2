<?php

namespace app\models\figures;

abstract class Figure
{
    abstract public function GetPerimeter();
    abstract public function GetArea();
    abstract public function GetInfo();
}
