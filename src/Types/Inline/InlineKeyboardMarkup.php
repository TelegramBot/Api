<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;

class InlineKeyboardMarkup extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['inline_keyboard'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'inline_keyboard' => true,
    ];

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     * Array of Array of InlineKeyboardButton
     *
     * @var array
     */
    protected array $inlineKeyboard;

    /**
     * @param array $inlineKeyboard
     */
    public function __construct(array $inlineKeyboard)
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
     */
    public function setInlineKeyboard(array $inlineKeyboard): void
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }
}
