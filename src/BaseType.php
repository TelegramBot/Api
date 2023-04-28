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
    protected static $requiredParams = [];

    /**
     * Map of input data
     *
     * @var array
     */
    protected static $map = [];

    /**
     * Validate input data
     *
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public static function validate($data)
    {
        if (count(array_intersect_key(array_flip(static::$requiredParams), $data)) === count(static::$requiredParams)) {
            return true;
        }

        throw new InvalidArgumentException();
    }

    /**
     * @param array $data
     * @return void
     */
    public function map($data)
    {
        foreach (static::$map as $key => $item) {
            if (isset($data[$key]) && (!is_array($data[$key]) || !empty($data[$key]))) {
                $method = 'set' . self::toCamelCase($key);
                if ($item === true) {
                    $this->$method($data[$key]);
                } else {
                    $this->$method($item::fromResponse($data[$key]));
                }
            }
        }
    }

    /**
     * @param string $str
     * @return string
     */
    protected static function toCamelCase($str)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson($inner = false)
    {
        $output = [];

        foreach (static::$map as $key => $item) {
            $property = lcfirst(self::toCamelCase($key));
            if (!is_null($this->$property)) {
                if (is_array($this->$property)) {
                    $output[$key] = array_map(
                        /**
                         * @param mixed $v
                         * @return array|false|string
                         */
                        function ($v) {
                            return is_object($v) ? $v->toJson(true) : $v;
                        },
                        $this->$property
                    );
                } else {
                    $output[$key] = $item === true ? $this->$property : $this->$property->toJson(true);
                }
            }
        }

        return $inner === false ? json_encode($output) : $output;
    }

    /**
     * @param array $data
     * @return static
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
