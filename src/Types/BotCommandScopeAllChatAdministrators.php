<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeAllChatAdministrators
 * Represents the scope covering all group and supergroup chat administrators.
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    protected $type = 'all_chat_administrators';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
