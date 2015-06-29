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
     * Map of input data
     *
     * @var array
     */
    protected static $map = array();

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

    public function map($data)
    {
        foreach (static::$map as $key => $item) {
            if (isset($data[$key])) {
                $method = 'set' . str_replace(" ", "", ucwords(str_replace("_", " ", $key)));
                if ($item === true) {
                    $this->$method($data[$key]);
                } else {
                    $this->$method($item::fromResponse($data[$key]));
                }
            }
        }
    }

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
