<?php

namespace TelegramBot\Api\Types;

/**
 * Class MessageOriginChat
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @package TelegramBot\Api\Types
 */
class MessageOriginChat extends MessageOrigin
{
    protected static $requiredParams = ['type', 'date', 'sender_chat'];

    protected static $map = [
        'type' => true,
        'date' => true,
        'sender_chat' => Chat::class,
        'author_signature' => true,
    ];

    protected $senderChat;
    protected $authorSignature;

    public function getSenderChat()
    {
        return $this->senderChat;
    }

    public function setSenderChat(Chat $senderChat)
    {
        $this->senderChat = $senderChat;
    }

    public function getAuthorSignature()
    {
        return $this->authorSignature;
    }

    public function setAuthorSignature($authorSignature)
    {
        $this->authorSignature = $authorSignature;
    }
}
