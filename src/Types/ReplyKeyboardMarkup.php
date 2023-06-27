<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ReplyKeyboardMarkup
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
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
    protected static $requiredParams = ['keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'keyboard' => true,
        'one_time_keyboard' => true,
        'resize_keyboard' => true,
        'selective' => true,
        'is_persistent' => true,
        'input_field_placeholder' => true,
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
     * Optional. Requests clients to hide the keyboard as soon as it's been used. Defaults to false.
     *
     * @var bool|null
     */
    protected $oneTimeKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected $selective;

    /**
     * Optional. Requests clients to always show the keyboard when the regular keyboard is hidden.
     * Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
     *
     * @var bool|null
     */
    protected $isPersistent;

    /**
     * Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     *
     * @var string|null
     */
    protected $inputFieldPlaceholder;

    /**
     * @param array $keyboard
     * @param bool|null $oneTimeKeyboard
     * @param bool|null $resizeKeyboard
     * @param bool|null $selective
     * @param bool|null $isPersistent
     * @param string|null $inputFieldPlaceholder
     */
    public function __construct($keyboard = [], $oneTimeKeyboard = null, $resizeKeyboard = null, $selective = null, $isPersistent = null, $inputFieldPlaceholder = null)
    {
        $this->keyboard = $keyboard;
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        $this->resizeKeyboard = $resizeKeyboard;
        $this->selective = $selective;
        $this->isPersistent = $isPersistent;
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
    }

    /**
     * @return array
     */
    public function getKeyboard()
    {
        return $this->keyboard;
    }

    /**
     * @param array $keyboard
     * @return void
     */
    public function setKeyboard($keyboard)
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @return bool|null
     */
    public function isOneTimeKeyboard()
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool $oneTimeKeyboard
     * @return void
     */
    public function setOneTimeKeyboard($oneTimeKeyboard)
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;
    }

    /**
     * @return bool|null
     */
    public function isResizeKeyboard()
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool $resizeKeyboard
     * @return void
     */
    public function setResizeKeyboard($resizeKeyboard)
    {
        $this->resizeKeyboard = $resizeKeyboard;
    }

    /**
     * @return bool|null
     */
    public function isSelective()
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     * @return void
     */
    public function setSelective($selective)
    {
        $this->selective = $selective;
    }

    /**
     * @return bool|null
     */
    public function getIsPersistent()
    {
        return $this->isPersistent;
    }

    /**
     * @param bool $isPersistent
     * @return void
     */
    public function setIsPersistent($isPersistent)
    {
        $this->isPersistent = $isPersistent;
    }

    /**
     * @return string|null
     */
    public function getInputFieldPlaceholder()
    {
        return $this->inputFieldPlaceholder;
    }

    /**
     * @param string|null $inputFieldPlaceholder
     * @return void
     */
    public function setInputFieldPlaceholder($inputFieldPlaceholder)
    {
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
    }
}
