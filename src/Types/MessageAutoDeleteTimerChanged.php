<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class MessageAutoDeleteTimerChanged
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @package TelegramBot\Api\Types
 */
class MessageAutoDeleteTimerChanged extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_auto_delete_time'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_auto_delete_time' => true,
    ];

    /**
     * New auto-delete time for messages in the chat; in seconds
     *
     * @var int
     */
    protected $messageAutoDeleteTime;

    /**
     * @return int
     */
    public function getMessageAutoDeleteTime()
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param int $messageAutoDeleteTime
     * @return void
     */
    public function setMessageAutoDeleteTime($messageAutoDeleteTime)
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }
}
