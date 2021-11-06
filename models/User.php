<?php

namespace app\models;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass; 
    }

    public static function auth($login, $pass)
    {
        $user = User::getOneWhere('login', $login);
        if (!$user) return false; // login не найден в базе данных 

        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public static function getName()
    {
        return $_SESSION['login'] ?? '';
    }

    protected static function getTableName() {
        return 'users';
    }

}