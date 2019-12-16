<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ReplyKeyboardRemove
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard
 * and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard
 * is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user
 * presses a button (see ReplyKeyboardMarkup).
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
    static protected $requiredParams = ['remove_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
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
     * Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes
     * the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     *
     * @var bool|null
     */
    protected $selective;

    /**
     * ReplyKeyboardRemove constructor.
     * @param bool|null $removeKeyboard
     * @param bool|null $selective
     */
    public function __construct(?bool $removeKeyboard = null, ?bool $selective = null)
    {
        $this->removeKeyboard = $removeKeyboard;

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
     * @return ReplyKeyboardRemove
     */
    public function setRemoveKeyboard(bool $removeKeyboard): ReplyKeyboardRemove
    {
        $this->removeKeyboard = $removeKeyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     * @return ReplyKeyboardRemove
     */
    public function setSelective(bool $selective): ReplyKeyboardRemove
    {
        $this->selective = $selective;

        return $this;
    }
}
