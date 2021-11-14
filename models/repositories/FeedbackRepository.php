<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\Repository;
use app\models\entity\Feedback;

class FeedbackRepository extends Repository
{
    public function getFeedbacks()
    {
        $sql = "SELECT name, feedback FROM {$this->getTableName()} ORDER BY id DESC";
        return App::call()->db->queryAll($sql);
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