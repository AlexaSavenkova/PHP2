<?php
namespace app\engine;
class Autoload
{
    public function loadClass($className)
    {
        // Я оставила вариант с str_replace для быстроты
        // Но тут по хорошему без регулярок не обойтись, потому что последнй 4-й параметр
        // не устанавливает, а возвращает число произведеннх замен
        $search  = ['app\\', '\\'];
        $replace = [ROOT . DS, DS];
        $fileName = str_replace($search, $replace, $className) . ".php";

        // $fileName = preg_replace('/app/', ROOT, $className, 1);
        // $fileName = str_replace('\\', DS, $fileName) . ".php";

        if (file_exists($fileName)) {
            include  $fileName;
            
        }
    }
}
