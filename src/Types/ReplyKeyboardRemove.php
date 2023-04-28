<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ReplyKeyboardRemove
 * Upon receiving a message with this object,
 * Telegram clients will remove the current custom keyboard and display the default letter-keyboard.
 *
 * @package TelegramBot\Api\Types
 */
class ReplyKeyboardRemove extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['remove_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'remove_keyboard' => true,
        'selective' => true
    ];

    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard;
     * if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     *
     * @var bool
     */
    protected $removeKeyboard;

    /**
     * Optional. Use this parameter if you want to remove the keyboard for specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected $selective;

    /**
     * @param bool $removeKeyboard
     * @param bool $selective
     */
    public function __construct($removeKeyboard = true, $selective = false)
    {
        $this->removeKeyboard = $removeKeyboard;
        $this->selective = $selective;
    }

    /**
     * @return bool
     */
    public function getRemoveKeyboard()
    {
        return $this->removeKeyboard;
    }

    /**
     * @param bool $removeKeyboard
     * @return void
     */
    public function setRemoveKeyboard($removeKeyboard)
    {
        $this->removeKeyboard = $removeKeyboard;
    }

    /**
     * @return bool|null
     */
    public function getSelective()
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     * @return void
     */
    public function setSelective($selective)
    {
        $this->selective = $selective;
    }
}
