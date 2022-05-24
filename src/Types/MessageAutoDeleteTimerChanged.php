<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 *
 * @package TelegramBot\Api\Types
 */
class MessageAutoDeleteTimerChanged extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['message_auto_delete_time'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'message_auto_delete_time' => true,
    ];

    /**
     * New auto-delete time for messages in the chat; in seconds
     *
     * @var integer
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
     */
    public function setMessageAutoDeleteTime($messageAutoDeleteTime)
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }


}
