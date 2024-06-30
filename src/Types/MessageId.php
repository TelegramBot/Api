<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

/**
 * Class MessageId
 * This object represents a unique message identifier.
 *
 * @package TelegramBot\Api\Types
 */
class MessageId extends MaybeInaccessibleMessage
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_id' => true,
    ];

    /**
     * Unique message identifier
     *
     * @var int
     */
    protected $messageId;

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
}
