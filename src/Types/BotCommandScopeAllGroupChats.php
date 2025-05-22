<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeAllGroupChats
 * Represents the scope covering all group and supergroup chats.
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    protected $type = 'all_group_chats';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
