<?php

namespace TelegramBot\Api;

/**
 * Class BaseType
 * Base class for Telegram Types
 *
 * @package TelegramBot\Api
 */
abstract class BaseType
{
    /**
     * Array of required data params for type
     *
     * @var array
     */
    protected static $requiredParams = array();

    /**
     * Validate input data
     *
     * @param array $data
     */
    public static function validate($data)
    {
        if (count(array_intersect_key(array_flip(static::$requiredParams), $data)) === count(static::$requiredParams)) {
            return true;
        }

        throw new InvalidArgumentException();
    }
}
