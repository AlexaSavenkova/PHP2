<?php

namespace app\models\repositories;

use app\models\Repository;
use app\engine\Db;
use app\models\entity\Feedback;

class FeedbackRepository extends Repository
{
    public static function getFeedbacks()
    {
        $sql = "SELECT name, feedback FROM feedback ORDER BY id DESC";
        return Db::getInstance()->queryAll($sql);
    }

    protected function getTableName()
    {
        return 'feedback';
    }

    protected function getEntityClass()
    {
        return Feedback::class;
    }
}