<?php

namespace app\controllers;

use app\models\repositories\FeedbackRepository;
use app\models\entity\Feedback;

class FeedbackController extends Controller
{

    public function actionIndex()
    {
        $feedback = (new FeedbackRepository())->getFeedbacks(); 
        echo $this->render('feedback', ['feedback' => $feedback]);
    }

    public function actionAdd()
    {
        if (isset($_POST['name']) && isset($_POST['feedback']))
        {
            $feedback = new Feedback($_POST['name'], $_POST['feedback']);
            (new FeedbackRepository())->save($feedback);
            header("Location: /feedback");
            die();
        }
        

    }
}
