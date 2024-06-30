<?php

namespace TelegramBot\Api\Types;

/**
 * Class MessageOriginChannel
 * The message was originally sent to a channel chat.
 *
 * @package TelegramBot\Api\Types
 */
class MessageOriginChannel extends MessageOrigin
{
    protected static $requiredParams = ['type', 'date', 'chat', 'message_id'];

    protected static $map = [
        'type' => true,
        'date' => true,
        'chat' => Chat::class,
        'message_id' => true,
        'author_signature' => true,
    ];

    protected $chat;
    protected $messageId;
    protected $authorSignature;

    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    public function setChat($chat): void
    {
        $this->chat = $chat;
    }

    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    public function setMessageId($messageId): void
    {
        $this->messageId = $messageId;
    }

    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    public function setAuthorSignature($authorSignature): void
    {
        $this->authorSignature = $authorSignature;
    }
}
