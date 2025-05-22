<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeDefault
 * Represents the default scope of bot commands.
 */
class BotCommandScopeDefault extends BotCommandScope
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
