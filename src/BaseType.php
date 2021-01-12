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
    protected static array $requiredParams = [];

    /**
     * Map of input data
     *
     * @var array
     */
    protected static array $map = [];

    /**
     * Validate input data
     *
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public static function validate(array $data): bool
    {
        if (count(array_intersect_key(array_flip(static::$requiredParams), $data)) === count(static::$requiredParams)) {
            return true;
        }

        throw new InvalidArgumentException('Validation error');
    }

    /**
     * @param array $data
     */
    public function map(array $data): void
    {
        foreach (static::$map as $key => $item) {
            if (isset($data[$key]) && (!is_array($data[$key]) || (is_array($data[$key]) && !empty($data[$key])))) {
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
     *
     * @return string|string[]
     */
    protected static function toCamelCase(string $str)
    {
        return str_replace(" ", "", ucwords(str_replace("_", " ", $str)));
    }

    /**
     * @param bool $inner
     *
     * @return array|false|string
     * @throws \JsonException
     */
    public function toJson(bool $inner = false)
    {
        $output = [];

        foreach (static::$map as $key => $item) {
            $property = lcfirst(self::toCamelCase($key));
            if (!is_null($this->$property)) {
                if (is_array($this->$property)) {
                    $output[$key] = array_map(
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

        return $inner === false ? json_encode($output, JSON_THROW_ON_ERROR) : $output;
    }

    /**
     * @param $data
     *
     * @return bool|static
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        if ($data === true) {
            return true;
        }

        self::validate($data);
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
