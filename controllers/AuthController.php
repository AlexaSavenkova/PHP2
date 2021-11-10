<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        if ((new UserRepository())->auth($login, $pass)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die("Не верный логин или пароль");
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }
}
