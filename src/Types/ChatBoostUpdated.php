<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBoostUpdated
 * This object represents a boost added to a chat or changed.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'boost'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'boost' => ChatBoost::class
    ];

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Information about the chat boost
     *
     * @var ChatBoost
     */
    protected $boost;

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
     * @return ChatBoost
     */
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * @param ChatBoost $boost
     */
    public function setBoost($boost)
    {
        $this->boost = $boost;
    }
}
