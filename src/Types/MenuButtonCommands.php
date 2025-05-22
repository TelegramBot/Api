<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class MenuButtonCommands
 * Represents a menu button opening the bot's list of commands.
 */
class MenuButtonCommands extends MenuButton
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    protected $type = 'commands';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
