<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class SwitchInlineQueryChosenChat
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @package TelegramBot\Api\Types
 */
class SwitchInlineQueryChosenChat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'query' => true,
        'allow_user_chats' => true,
        'allow_bot_chats' => true,
        'allow_group_chats' => true,
        'allow_channel_chats' => true
    ];

    /**
     * Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted.
     *
     * @var string|null
     */
    protected $query;

    /**
     * Optional. True, if private chats with users can be chosen.
     *
     * @var bool|null
     */
    protected $allowUserChats;

    /**
     * Optional. True, if private chats with bots can be chosen.
     *
     * @var bool|null
     */
    protected $allowBotChats;

    /**
     * Optional. True, if group and supergroup chats can be chosen.
     *
     * @var bool|null
     */
    protected $allowGroupChats;

    /**
     * Optional. True, if channel chats can be chosen.
     *
     * @var bool|null
     */
    protected $allowChannelChats;

    /**
     * @return string|null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     * @return void
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats()
    {
        return $this->allowUserChats;
    }

    /**
     * @param bool|null $allowUserChats
     * @return void
     */
    public function setAllowUserChats($allowUserChats)
    {
        $this->allowUserChats = $allowUserChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowBotChats()
    {
        return $this->allowBotChats;
    }

    /**
     * @param bool|null $allowBotChats
     * @return void
     */
    public function setAllowBotChats($allowBotChats)
    {
        $this->allowBotChats = $allowBotChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats()
    {
        return $this->allowGroupChats;
    }

    /**
     * @param bool|null $allowGroupChats
     * @return void
     */
    public function setAllowGroupChats($allowGroupChats)
    {
        $this->allowGroupChats = $allowGroupChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats()
    {
        return $this->allowChannelChats;
    }

    /**
     * @param bool|null $allowChannelChats
     * @return void
     */
    public function setAllowChannelChats($allowChannelChats)
    {
        $this->allowChannelChats = $allowChannelChats;
    }
}




