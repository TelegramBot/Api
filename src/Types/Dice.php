<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Dice extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['emoji', 'value'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'emoji' => true,
        'value' => true
    ];

    /**
     * Emoji on which the dice throw animation is based
     *
     * @var string
     */
    protected string $emoji;

    /**
     * Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     *
     * @var int
     */
    protected int $value;

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
