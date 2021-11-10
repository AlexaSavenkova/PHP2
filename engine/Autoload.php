<?php
namespace app\engine;
class Autoload
{
    public function loadClass($className)
    {
        $search  = ['app\\', '\\'];
        $replace = [ROOT . DS, DS];
        $fileName = str_replace($search, $replace, $className) . ".php";
        
        // Вариант с регулярокой
        // $fileName = preg_replace('/app/', ROOT, $className, 1);
        // $fileName = str_replace('\\', DS, $fileName) . ".php";

        if (file_exists($fileName)) {
            include  $fileName;
        }
    }
}
