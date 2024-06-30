<?php

namespace TelegramBot\Api\Types;

/**
 * Class ReactionTypeEmoji
 * This object describes a reaction based on an emoji.
 *
 * @package TelegramBot\Api
 */
class ReactionTypeEmoji extends ReactionType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'emoji' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'emoji'];
    /**
     * Reaction emoji
     *
     * @var string
     */
    protected $emoji;

    /**
     * Get the reaction emoji.
     *
     * @return string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * Set the reaction emoji.
     *
     * @param string $emoji
     */
    protected function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }
}
