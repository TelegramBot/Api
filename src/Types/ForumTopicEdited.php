<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ForumTopicEdited
 * This object represents a service message about an edited forum topic.
 *
 * @package TelegramBot\Api\Types
 */
class ForumTopicEdited extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'name' => true,
        'icon_custom_emoji_id' => true,
    ];

    /**
     * Optional. New name of the topic, if it was edited
     *
     * @var string|null
     */
    protected $name;

    /**
     * Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
     *
     * @var string|null
     */
    protected $iconCustomEmojiId;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId()
    {
        return $this->iconCustomEmojiId;
    }

    /**
     * @param string|null $iconCustomEmojiId
     * @return void
     */
    public function setIconCustomEmojiId($iconCustomEmojiId)
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
    }
}
