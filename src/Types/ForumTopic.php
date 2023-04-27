<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ForumTopic
 * This object represents a forum topic.
 *
 * @package TelegramBot\Api\Types
 * @author bernard-ng <bernard@devscast.tech>
 */
class ForumTopic extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_thread_id', 'name', 'icon_color'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_thread_id' => true,
        'name' => true,
        'icon_color' => true,
        'icon_custom_emoji_id' => true,
    ];

    /**
     * Unique identifier of the forum topic
     *
     * @var int
     */
    protected $messageThreadId;

    /**
     * Name of the topic
     *
     * @var string
     */
    protected $name;

    /**
     * Color of the topic icon in RGB format
     *
     * @var int
     */
    protected $iconColor;

    /**
     * Optional. Unique identifier of the custom emoji shown as the topic icon
     *
     * @var string|null
     */
    protected $iconCustomEmojiId;

    /**
     * @return int
     */
    public function getMessageThreadId()
    {
        return $this->messageThreadId;
    }

    /**
     * @param int $messageThreadId
     * @return void
     */
    public function setMessageThreadId($messageThreadId)
    {
        $this->messageThreadId = $messageThreadId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getIconColor()
    {
        return $this->iconColor;
    }

    /**
     * @param int $iconColor
     * @return void
     */
    public function setIconColor($iconColor)
    {
        $this->iconColor = $iconColor;
    }

    /**
     * @return null|string
     */
    public function getIconCustomEmojiId()
    {
        return $this->iconCustomEmojiId;
    }

    /**
     * @param string $iconCustomEmojiId
     * @return void
     */
    public function setIconCustomEmojiId($iconCustomEmojiId)
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
    }
}
