<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class MessageOriginChannel extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'date', 'chat', 'message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'date' => true,
        'chat' => Chat::class,
        'message_id' => true,
        'author_signature' => true,
    ];

    /**
     * Type of the message origin, always “channel”
     *
     * @var string
     */
    protected $type = 'channel';

    /**
     * Date the message was sent originally in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Channel chat to which the message was originally sent
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Unique message identifier inside the chat
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. Signature of the original post author
     *
     * @var string|null
     */
    protected $authorSignature;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature()
    {
        return $this->authorSignature;
    }

    /**
     * @param string|null $authorSignature
     */
    public function setAuthorSignature($authorSignature)
    {
        $this->authorSignature = $authorSignature;
    }
}
