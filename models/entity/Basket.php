<?php

namespace app\models\entity;
use app\models\Entity;

class Basket extends Entity
{
	
    protected $id;
    protected $product_id;
    protected $session_id;
    protected $quantity;

    protected $props = [
        'product_id' => false,
        'session_id' => false,
        'quantity' => false,
    ];

    public function __construct($session_id = null, $product_id = null, $quantity = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
    
}