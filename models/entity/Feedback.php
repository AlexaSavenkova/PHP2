<?php

namespace app\models\entity;

use app\engine\Db;
use app\models\Entity;

class Feedback extends Entity
{
    protected $id;
    protected $name;
    protected $feedback;

    protected $props = [
        'name' => false,
        'feedback' => false
    ];

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }
}
