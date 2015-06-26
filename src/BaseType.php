<?php

namespace tgbot\Api;

abstract class BaseType
{
    function toCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = lcfirst($str[0]);
        }

        return $str;
    }
}