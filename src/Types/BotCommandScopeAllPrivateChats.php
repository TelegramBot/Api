<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeAllPrivateChats
 * Represents the scope covering all private chats.
 */
class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    protected $type = 'all_private_chats';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
