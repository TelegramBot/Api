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
     * @var User|null
     */
    protected $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available if the message is too old
     *
     * @var Message|null
     */
    protected $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     *
     * @var string|null
     */
    protected $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games (https://core.telegram.org/bots/api#games).
     *
     * @var string|null
     */
    protected $chatInstance;

    /**
     * Optional. Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string|null
     */
    protected $data;

    /**
     * Optional. Short name of a Game (https://core.telegram.org/bots/api#games) to be returned,
     * serves as the unique identifier for the game.
     *
     * @var string|null
     */
    protected $gameShortName;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return CallbackQuery
     */
    public function setId(string $id): CallbackQuery
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return CallbackQuery
     */
    public function setFrom(User $from): CallbackQuery
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     * @return CallbackQuery
     */
    public function setMessage(Message $message): CallbackQuery
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     * @return CallbackQuery
     */
    public function setInlineMessageId(string $inlineMessageId): CallbackQuery
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChatInstance(): ?string
    {
        return $this->chatInstance;
    }

    /**
     * @param string $chatInstance
     * @return CallbackQuery
     */
    public function setChatInstance(string $chatInstance): CallbackQuery
    {
        $this->chatInstance = $chatInstance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return CallbackQuery
     */
    public function setData(string $data): CallbackQuery
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

    /**
     * @param string $gameShortName
     * @return CallbackQuery
     */
    public function setGameShortName(string $gameShortName): CallbackQuery
    {
        $this->gameShortName = $gameShortName;

        return $this;
    }
}
