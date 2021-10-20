<?php

namespace app\models;

class Orders extends Model
{
  public $id;
  public $name;
  public $phone;
  public $user_id;
  public $session_id;
  public $sum;
  public $status;

    public function getTableName()
    {
        return 'orders';
    }   
}
