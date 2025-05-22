<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class MenuButtonDefault
 * Describes that no specific value for the menu button was set.
 */
class MenuButtonDefault extends MenuButton
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    protected $type = 'default';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
