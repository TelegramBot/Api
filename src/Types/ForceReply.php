<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ForceReply
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user
 * (act as if the user has selected the bot‘s message and tapped ’Reply').This can be extremely useful
 * if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 *
 * @package TelegramBot\Api\Types
 */
class ForceReply extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['force_reply'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'force_reply' => true,
        'selective' => true
    ];

    /**
     * Shows reply interface to the user, as if they manually selected the bot‘s message and tapped ’Reply'
     *
     * @var bool
     */
    protected $forceReply;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected $selective;

    /**
     * @param bool $forceReply
     * @param bool|null $selective
     */
    public function __construct($forceReply = true, $selective = null)
    {
        $this->forceReply = $forceReply;
        $this->selective = $selective;
    }

    /**
     * @return bool
     */
    public function isForceReply()
    {
        return $this->forceReply;
    }

    /**
     * @param bool $forceReply
     * @return void
     */
    public function setForceReply($forceReply)
    {
        $this->forceReply = $forceReply;
    }

    /**
     * @return bool|null
     */
    public function isSelective()
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     * @return void
     */
    public function setSelective($selective)
    {
        $this->selective = $selective;
    }
}
