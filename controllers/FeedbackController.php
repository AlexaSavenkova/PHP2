<?php

namespace app\controllers;

use app\models\entity\Feedback;
use app\engine\App;

class FeedbackController extends Controller
{

    public function actionIndex()
    {
        $feedback = App::call()->feedbackRepository->getFeedbacks();
        echo $this->render('feedback', ['feedback' => $feedback]);
    }

    public function actionAdd()
    {
        if (isset($_POST['name']) && isset($_POST['feedback']))
        {
            $feedback = new Feedback($_POST['name'], $_POST['feedback']);
            App::call()->feedbackRepository->save($feedback);
            header("Location: /feedback");
            die();
        }
        

    }
}
