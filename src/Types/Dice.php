<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Dice
 * This object represents a dice with random value from 1 to 6.
 * (Yes, we're aware of the “proper” singular of die.
 * But it's awkward, and we decided to help it change. One dice at a time!)
 *
 * @package TelegramBot\Api\Types
 */
class Dice extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['value'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'value' => true
    ];

    /**
     * Emoji on which the dice throw animation is based
     * @var string
     */
    protected $emoji;

    /**
     * Value of the dice, 1-6
     *
     * @var integer
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
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param integer $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}
