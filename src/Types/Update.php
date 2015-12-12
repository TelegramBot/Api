<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Update extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['update_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'update_id' => true,
        'message' => Message::class,
    ];

    /**
     * The update‘s unique identifier.
     * Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or
     * to restore the correct update sequence, should they get out of order.
     *
     * @var integer
     */
    protected $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var Message
     */
    protected $message;

    /**
     * @return int
     */
    public function getUpdateId()
    {
        return $this->updateId;
    }

    /**
     * @param int $updateId
     */
    public function setUpdateId($updateId)
    {
        $this->updateId = $updateId;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }
}
