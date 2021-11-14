<?php

namespace app\models\entity;

use app\models\Entity;

class User extends Entity
{
    protected $id;
    protected $login;
    protected $pass;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'role' => false
    ];

    public function __construct($login = null, $pass = null, $role = null)
    {
        $this->login = $login;
        $this->pass = $pass; 
        $this->role = $role;
    }

}