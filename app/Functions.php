<?php

namespace App;

class Functions
{
    public static function encrypt($string, $key = 5)
    {
        $result = '';
        for ($i = 0, $k = strlen($string); $i < $k; $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

    public static function decrypt($string, $key = 5)
    {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0, $k = strlen($string); $i < $k; $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

    public static function jscandir($dir, $sort=0)
    {
        $list = scandir($dir, $sort);

        // если директории не существует
        if (!$list) return false;

        // удаляем . и .. (я думаю редко кто использует)
        if ($sort == 0) unset($list[0],$list[1]);
        else unset($list[count($list)-1], $list[count($list)-1]);
        return $list;
    }
}
?>