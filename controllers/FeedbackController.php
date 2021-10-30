<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController extends Controller
{

    public function actionIndex()
    {
        $feedback = Feedback::getFeedbacks(); 
        echo $this->render('feedback', ['feedback' => $feedback]);
    }

    public function actionAdd()
    {
        if (isset($_POST['name']) && isset($_POST['feedback']))
        {
            $feedback = new Feedback($_POST['name'], $_POST['feedback']);
            $feedback->save();
            header("Location: /?c=feedback");
            die();
        }
        

    }
}
