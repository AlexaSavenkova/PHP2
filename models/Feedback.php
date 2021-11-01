<?php

namespace app\models;

use app\engine\Db;


class Feedback extends DbModel
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

    public static function getFeedbacks()
    {
        $sql = "SELECT name, feedback FROM feedback ORDER BY id DESC";
        return Db::getInstance()->queryAll($sql);
    }

    protected static function getTableName()
    {
        return 'feedback';
    }
}
