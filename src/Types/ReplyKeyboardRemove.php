<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ReplyKeyboardRemove extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['remove_keyboard'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'remove_keyboard' => true,
        'selective' => true
    ];

    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard;
     * if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     *
     * @var bool
     */
    protected bool $removeKeyboard;

    /**
     * Optional. Use this parameter if you want to remove the keyboard for specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool
     */
    protected bool $selective;

    /**
     * @param bool $remove_keyboard
     * @param bool $selective
     */
    public function __construct(bool $remove_keyboard = true, bool $selective = false)
    {
        $this->removeKeyboard = $remove_keyboard;
        $this->selective = $selective;
    }

    /**
     * @return bool
     */
    public function isRemoveKeyboard(): bool
    {
        return $this->removeKeyboard;
    }

    /**
     * @param bool $removeKeyboard
     */
    public function setRemoveKeyboard(bool $removeKeyboard): void
    {
        $this->removeKeyboard = $removeKeyboard;
    }

    /**
     * @return bool
     */
    public function isSelective(): bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     */
    public function setSelective(bool $selective): void
    {
        $this->selective = $selective;
    }
}
