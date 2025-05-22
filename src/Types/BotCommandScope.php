<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class BotCommandScope extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type'];
    protected static $map = ['type' => true];

    /**
     * @psalm-suppress LessSpecificReturnType,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'default':
                return BotCommandScopeDefault::fromResponse($data);
            case 'all_private_chats':
                return BotCommandScopeAllPrivateChats::fromResponse($data);
            case 'all_group_chats':
                return BotCommandScopeAllGroupChats::fromResponse($data);
            case 'all_chat_administrators':
                return BotCommandScopeAllChatAdministrators::fromResponse($data);
            case 'chat':
                return BotCommandScopeChat::fromResponse($data);
            case 'chat_administrators':
                return BotCommandScopeChatAdministrators::fromResponse($data);
            case 'chat_member':
                return BotCommandScopeChatMember::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown bot command scope type: ' . $data['type']);
        }
    }

    protected $type;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
