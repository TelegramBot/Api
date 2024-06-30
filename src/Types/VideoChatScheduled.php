<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class VideoChatScheduled
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @package TelegramBot\Api\Types
 */
class VideoChatScheduled extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['start_date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'start_date' => true,
    ];

    /**
     * Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     *
     * @var int
     */
    protected $startDate;

    /**
     * @return int
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param int $startDate
     * @return void
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
}
