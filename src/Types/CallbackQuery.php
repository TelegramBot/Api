<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class CallbackQuery
 * This object represents an incoming callback query from a callback
 * button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot,
 * the field message will be present.
 * If the button was attached to a message sent via the bot (in inline mode),
 * the field inline_message_id will be present.
 * Exactly one of the fields data or game_short_name will be present.
 *
 * @package TelegramBot\Api\Types
 */
class CallbackQuery extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['id', 'from'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'from' => User::class,
        'message' => Message::class,
        'inline_message_id' => true,
        'chat_instance' => true,
        'data' => true,
        'game_short_name' => true
    ];

    /**
     * Unique identifier for this query
     *
     * @var string
     */
    protected $id;

    /**
     * Sender
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available
     * if the message is too old
     *
     * @var \TelegramBot\Api\Types\Message
     */
    protected $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode,
     * that originated the query.
     *
     * @var string
     */
    protected $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     *
     * @var string
     */
    protected $chatInstance;

    /**
     * Optional. Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected $data;

    /**
     * Optional. Short name of a Game to be returned,
     * serves as the unique identifier for the game
     *
     * @var string
     */
    protected $gameShortName;


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     */
    public function setInlineMessageId($inlineMessageId)
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string
     */
    public function getChatInstance()
    {
        return $this->chatInstance;
    }

    /**
     * @param string $chatInstance
     */
    public function setChatInstance($chatInstance)
    {
        $this->chatInstance = $chatInstance;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getGameShortName()
    {
        return $this->gameShortName;
    }

    /**
     * @param string $gameShortName
     */
    public function setGameShortName($gameShortName)
    {
        $this->gameShortName = $gameShortName;
    }
}
