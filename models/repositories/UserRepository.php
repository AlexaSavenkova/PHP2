<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entity\User;

class UserRepository extends Repository 
{
    public function auth($login, $pass)
    {
        $user = $this->getOneWhere('login', $login);
        if (!$user) return false; // login не найден в базе данных 

        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth()
    {
        return isset($_SESSION['login']);
    }
    public function isAdmin()
    {
        if(isset($_SESSION['login'])) {
            $user = $this->getOneWhere('login', $_SESSION['login']);

            if ($user->role == 1)
            {
                return true;
            }
        }
        return false;
    }
    public function getName()
    {
        return $_SESSION['login'] ?? '';
    }

    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return User::class;
    }

}