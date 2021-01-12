<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ForceReply extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['force_reply'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'force_reply' => true,
        'selective' => true
    ];

    /**
     * Shows reply interface to the user, as if they manually selected the bot‘s message and tapped ’Reply'
     *
     * @var bool
     */
    protected bool $forceReply;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected ?bool $selective;

    public function __construct($forceReply = true, $selective = null)
    {
        $this->forceReply = $forceReply;
        $this->selective  = $selective;
    }

    /**
     * @return bool
     */
    public function isForceReply(): bool
    {
        return $this->forceReply;
    }

    /**
     * @param bool $forceReply
     */
    public function setForceReply(bool $forceReply): void
    {
        $this->forceReply = $forceReply;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     */
    public function setSelective(?bool $selective): void
    {
        $this->selective = $selective;
    }
}

