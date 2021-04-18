<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Dice
 * This object represents an animated emoji that displays a random value.
 */
class Dice extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['emoji', 'value'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'emoji' => true,
        'value' => true
    ];

    /**
     * Emoji on which the dice throw animation is based
     *
     * @var string
     */
    protected $emoji;

    /**
     * Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     *
     * @var int
     */
    protected $value;

    /**
     * @return string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
