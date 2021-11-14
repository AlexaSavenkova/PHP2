<?php

namespace app\models\entity;
use app\models\Entity;

class Order extends Entity
{
    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'session_id' => false,
    ];

    /**
     * @param $name
     * @param $phone
     * @param $session_id
     */
    public function __construct($name = null, $phone = null, $session_id = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }


}