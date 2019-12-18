<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ReplyKeyboardMarkup
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples)
 *
 * @package TelegramBot\Api\Types
 */
class ReplyKeyboardMarkup extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'keyboard' => true,
        'one_time_keyboard' => true,
        'resize_keyboard' => true,
        'selective' => true
    ];

    /**
     * Array of button rows, each represented by an Array of Strings
     * Array of Array of String
     *
     * @var array
     */
    protected $keyboard;

    /**
     * Optional. Requests clients to resize the keyboard vertically for optimal fit
     * (e.g., make the keyboard smaller if there are just two rows of buttons).
     * Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
     *
     * @var bool|null
     */
    protected $resizeKeyboard;

    /**
     * Optional. Requests clients to hide the keyboard as soon as it's been used.
     * The keyboard will still be available, but clients will automatically display
     * the usual letter-keyboard in the chat – the user can press a special button in the input
     * field to see the custom keyboard again. Defaults to false.
     *
     * @var bool|null
     */
    protected $oneTimeKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     * Example: A user requests to change the bot‘s language,
     * bot replies to the request with a keyboard to select the new language.
     * Other users in the group don’t see the keyboard.
     *
     * @var bool|null
     */
    protected $selective;

    /**
     * ReplyKeyboardMarkup constructor.
     * @param array|null $keyboard
     * @param bool|null $resizeKeyboard
     * @param bool|null $oneTimeKeyboard
     * @param bool|null $selective
     */
    public function __construct(?array $keyboard = null, ?bool $resizeKeyboard = null, ?bool $oneTimeKeyboard = null, ?bool $selective = null)
    {
        $this->keyboard = $keyboard;
        $this->resizeKeyboard = $resizeKeyboard;
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        $this->selective = $selective;
    }


    /**
     * @return array
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param array $keyboard
     * @return ReplyKeyboardMarkup
     */
    public function setKeyboard(array $keyboard): ReplyKeyboardMarkup
    {
        $this->keyboard = $keyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isResizeKeyboard(): ?bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool $resizeKeyboard
     * @return ReplyKeyboardMarkup
     */
    public function setResizeKeyboard(bool $resizeKeyboard): ReplyKeyboardMarkup
    {
        $this->resizeKeyboard = $resizeKeyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isOneTimeKeyboard(): ?bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool $oneTimeKeyboard
     * @return ReplyKeyboardMarkup
     */
    public function setOneTimeKeyboard(bool $oneTimeKeyboard): ReplyKeyboardMarkup
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     * @return ReplyKeyboardMarkup
     */
    public function setSelective(bool $selective): ReplyKeyboardMarkup
    {
        $this->selective = $selective;

        return $this;
    }
}
