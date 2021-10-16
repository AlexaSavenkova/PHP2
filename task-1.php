<?php
// класс описывает персонал какой-нибудь фирмы 
class Staff {
    public $name;
    public $position;  // должность
    public $salary;    // оклад
    public static $totalStaff = 0; // количество сотрудников компании

    public function __construct($name = null, $position = null, $salary = null)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
        self::$totalStaff++;  // увеличивается при создании нового экземпляра класса (и дочерноего класса) 
    }

    public function getStatus() 
    {
        echo "{$this->name}  работает в должности {$this->position} с окладом {$this->salary} <br><br> ";
    }
}

class Boss extends Staff 
{
    public function __construct($name = null, $position = null, $salary = null)
    {
        parent::__construct($name, $position, $salary);
    }

    //  босс может увеличить зарплату любого сотрудника компании
    public function raiseSalary(Staff $staff, int $raise)
    {
        $staff->salary += $raise;
        echo "{$this->position} {$this->name} увеличил зп сотрудника {$staff->name} на {$raise} <br><br>";
    }
}

$employee1 = new Staff("Василий", "бухгалтер", 800);
$employee2 = new Staff("Мария", "секретарь", 600);
$boss = new Boss("Георгий", "директор", 1200);

$employee1->getStatus();
$employee2->getStatus();
$boss->getStatus();
$boss->raiseSalary($employee1, 100);
$employee1->getStatus();


echo "Всего сотрудников в компани: ".Staff::$totalStaff;