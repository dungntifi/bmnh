<?php

/**
 * Created by PhpStorm.
 * User: NhatThao
 * Date: 11/21/2015
 * Time: 12:04 PM
 */
class HelperBase
{
    public static function getLastChar($title, $lenght = 250)
    {
        $char = substr($title, $lenght - 1, 1);
        if ($char === ' ') {
            return $lenght - 1;
        } else {
            return self::getLastChar($title, $lenght - 1);
        }
    }

    public static function getSubTitleTab($title, $length = 100)
    {
        if (strlen($title) > $length) {
            $subLength = self::getLastChar($title, $length);
            $title = substr($title, 0, $subLength) . '...';
        }
        return $title;
    }
}