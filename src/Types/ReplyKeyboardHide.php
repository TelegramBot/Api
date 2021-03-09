<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ReplyKeyboardHide extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['hide_keyboard'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'hide_keyboard' => true,
        'selective' => true
    ];

    /**
     * Requests clients to hide the custom keyboard
     *
     * @var bool
     */
    protected bool $hideKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected ?bool $selective;

    /**
     * @param bool      $hideKeyboard
     * @param bool|null $selective
     */
    public function __construct(bool $hideKeyboard = true, ?bool $selective = null)
    {
        $this->hideKeyboard = $hideKeyboard;
        $this->selective    = $selective;
    }

    /**
     * @return bool
     */
    public function isHideKeyboard(): bool
    {
        return $this->hideKeyboard;
    }

    /**
     * @param bool $hideKeyboard
     */
    public function setHideKeyboard(bool $hideKeyboard): void
    {
        $this->hideKeyboard = $hideKeyboard;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     */
    public function setSelective(?bool $selective): void
    {
        $this->selective = $selective;
    }
}
