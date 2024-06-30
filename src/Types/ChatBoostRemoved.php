<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBoostRemoved
 * This object represents a boost removed from a chat.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostRemoved extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'boost_id', 'remove_date', 'source'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'boost_id' => true,
        'remove_date' => true,
        'source' => ChatBoostSource::class
    ];

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    protected $boostId;

    /**
     * Point in time (Unix timestamp) when the boost was removed
     *
     * @var int
     */
    protected $removeDate;

    /**
     * Source of the removed boost
     *
     * @var ChatBoostSource
     */
    protected $source;

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
     * @return string
     */
    public function getBoostId()
    {
        return $this->boostId;
    }

    /**
     * @param string $boostId
     */
    public function setBoostId($boostId)
    {
        $this->boostId = $boostId;
    }

    /**
     * @return int
     */
    public function getRemoveDate()
    {
        return $this->removeDate;
    }

    /**
     * @param int $removeDate
     */
    public function setRemoveDate($removeDate)
    {
        $this->removeDate = $removeDate;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
}
