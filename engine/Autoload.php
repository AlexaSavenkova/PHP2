<?php

class Autoload
{
    public function loadClass($className)
    {

        // это вариант, если мы точно знаем, что имя папки не будет заканчиваться на app 
        $search  = ['app\\', '\\'];
        $replace = ['../', '/'];
        $fileName = str_replace($search, $replace, $className) . ".php";

        // другий вариант - удалить первые 3 смивола $className, если пространство имен всегда начинается с  app\ 

        // $search  = '\\';
        // $replace = '/';
        // $fileName = ".." . str_replace($search, $replace, substr($className, 3))  . ".php";


        if (file_exists($fileName)) {
            include  $fileName;
            // var_dump($fileName);
        }
    }
}
