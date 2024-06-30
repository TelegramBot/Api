<?php

namespace TelegramBot\Api\Types;

/**
 * Class ReactionTypeCustomEmoji
 * This object describes a reaction based on a custom emoji.
 *
 * @package TelegramBot\Api
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'custom_emoji_id' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'custom_emoji_id'];

    /**
     * Custom emoji identifier
     *
     * @var string
     */
    protected $customEmojiId;

    /**
     * Get the custom emoji identifier.
     *
     * @return string
     */
    public function getCustomEmojiId()
    {
        return $this->customEmojiId;
    }

    /**
     * Set the custom emoji identifier.
     *
     * @param string $customEmojiId
     */
    protected function setCustomEmojiId($customEmojiId)
    {
        $this->customEmojiId = $customEmojiId;
    }
}
