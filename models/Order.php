<?php

namespace app\models;

class Order extends Model
{
  public $id;
  public $name;
  public $phone;
  public $user_id;
  public $session_id;
  public $sum;
  public $status;

  public function __construct($name = null, $phone = null, $user_id = null, $session_id = null, $sum = null, $status = null)
  {
    $this->name = $name;
    $this->phone = $phone;
    $this->user_id = $user_id;
    $this->session_id = $session_id;
    $this->sum = $sum;
    $this->status = $status;

  }

  public function getTableName()
  {
    return 'orders';
  }   
}
