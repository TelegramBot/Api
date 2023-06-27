<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * class ForumTopicCreated.
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @package TelegramBot\Api\Types
 * @author bernard-ng <bernard@devscast.tech>
 */
class ForumTopicCreated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['name', 'icon_color'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'name' => true,
        'icon_color' => true,
        'icon_custom_emoji_id' => true,
    ];

    /**
     * Name of the forum topic
     *
     * @var string
     */
    protected $name;

    /**
     * Color of the forum topic
     *
     * @var string
     */
    protected $iconColor;

    /**
     * Custom emoji of the forum topic
     *
     * @var string
     */
    protected $iconCustomEmojiId;

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
     * @return string
     */
    public function getIconColor()
    {
        return $this->iconColor;
    }

    /**
     * @param string $iconColor
     * @return void
     */
    public function setIconColor($iconColor)
    {
        $this->iconColor = $iconColor;
    }

    /**
     * @return string
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
