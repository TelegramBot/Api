<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;

/**
 * Class InlineKeyboardMarkup
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class InlineKeyboardMarkup extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['inline_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'inline_keyboard' => true,
    ];

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     * Array of Array of InlineKeyboardButton
     *
     * @var array
     */
    protected $inlineKeyboard;

    /**
     * InlineKeyboardMarkup constructor.
     * @param array $inlineKeyboard
     */
    public function __construct(?array $inlineKeyboard = null)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    /**
     * @return array
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

    /**
     * @param array $inlineKeyboard
     * @return InlineKeyboardMarkup
     */
    public function setInlineKeyboard(array $inlineKeyboard): InlineKeyboardMarkup
    {
        $this->inlineKeyboard = $inlineKeyboard;

        return $this;
    }
}
