<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * This object represents a unique message identifier.
 */
/**
 * Class InaccessibleMessage
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @package TelegramBot\Api\Types
 */
/**
 * Class InaccessibleMessage
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @package TelegramBot\Api\Types
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'message_id', 'date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'date' => true,
    ];

    /**
     * Chat the message belonged to
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
     * Always 0. The field can be used to differentiate regular and inaccessible messages.
     *
     * @var int
     */
    protected $date;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
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
     * @return void
     */
    public function setChat(Chat $chat)
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
     * @return void
     * @throws InvalidArgumentException
     */
    public function setMessageId($messageId)
    {
        if (!is_int($messageId)) {
            throw new InvalidArgumentException('MessageId must be an integer');
        }
        $this->messageId = $messageId;
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
     * @return void
     * @throws InvalidArgumentException
     */
    public function setDate($date)
    {
        if (!is_int($date)) {
            throw new InvalidArgumentException('Date must be an integer');
        }
        $this->date = $date;
    }
}
