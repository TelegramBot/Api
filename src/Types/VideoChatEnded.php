<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class VideoChatEnded
 * This object represents a service message about a video chat ended in the chat.
 *
 * @package TelegramBot\Api\Types
 */
class VideoChatEnded extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'duration' => true,
    ];

    /**
     * Video chat duration in seconds
     *
     * @var int
     */
    protected $duration;

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
}
