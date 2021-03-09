<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ReplyKeyboardMarkup extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['keyboard'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'keyboard' => true,
        'resize_keyboard' => true,
        'one_time_keyboard' => true,
        'selective' => true
    ];

    /**
     * Array of button rows, each represented by an Array of Strings
     * Array of Array of KeyboardButton
     *
     * @var KeyboardButton[]
     */
    protected array $keyboard;

    /**
     * Optional. Requests clients to resize the keyboard vertically for optimal fit
     * (e.g., make the keyboard smaller if there are just two rows of buttons).
     * Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
     *
     * @var bool
     */
    protected ?bool $resizeKeyboard;

    /**
     * Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available,
     * but clients will automatically display the usual letter-keyboard in the chat – the user can press a special
     * button in the input field to see the custom keyboard again. Defaults to false.
     *
     * @var bool
     */
    protected ?bool $oneTimeKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only. Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select the
     * new language. Other users in the group don't see the keyboard.
     *
     * @var bool
     */
    protected ?bool $selective;

    /**
     * @param array     $keyboard
     * @param bool|null $resizeKeyboard
     * @param bool|null $oneTimeKeyboard
     * @param bool|null $selective
     */
    public function __construct(
        array $keyboard,
        ?bool $resizeKeyboard = null,
        ?bool $oneTimeKeyboard = null,
        ?bool $selective = null
    ) {
        $this->keyboard        = $keyboard;
        $this->resizeKeyboard  = $resizeKeyboard;
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        $this->selective       = $selective;
    }

    /**
     * @return KeyboardButton[]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param KeyboardButton[] $keyboard
     */
    public function setKeyboard(array $keyboard): void
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @return bool
     */
    public function isResizeKeyboard(): bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool $resizeKeyboard
     */
    public function setResizeKeyboard(bool $resizeKeyboard): void
    {
        $this->resizeKeyboard = $resizeKeyboard;
    }

    /**
     * @return bool
     */
    public function isOneTimeKeyboard(): bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool $oneTimeKeyboard
     */
    public function setOneTimeKeyboard(bool $oneTimeKeyboard): void
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;
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
