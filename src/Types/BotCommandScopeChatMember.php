<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class BotCommandScopeChatMember
 * Represents the scope covering a specific member of a chat.
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    protected static $requiredParams = ['type', 'chat_id', 'user_id'];

    protected static $map = [
        'type' => true,
        'chat_id' => true,
        'user_id' => true
    ];

    protected $type = 'chat_member';
    protected $chatId;
    protected $userId;

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

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
