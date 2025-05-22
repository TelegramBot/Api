<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeChatAdministrators
 * Represents the scope covering all administrators of a specific chat.
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    protected static $requiredParams = ['type', 'chat_id'];

    protected static $map = [
        'type' => true,
        'chat_id' => true
    ];

    protected $type = 'chat_administrators';
    protected $chatId;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getChatId()
    {
        return $this->chatId;
    }

    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }
}
