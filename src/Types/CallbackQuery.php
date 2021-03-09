<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class CallbackQuery extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['id', 'from'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
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
    protected string $id;

    /**
     * Sender
     *
     * @var User
     */
    protected User $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available
     * if the message is too old
     *
     * @var Message
     */
    protected Message $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode,
     * that originated the query.
     *
     * @var string
     */
    protected string $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     *
     * @var string
     */
    protected string $chatInstance;

    /**
     * Optional. Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected string $data;

    /**
     * Optional. Short name of a Game to be returned,
     * serves as the unique identifier for the game
     *
     * @var string
     */
    protected string $gameShortName;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getInlineMessageId(): string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     */
    public function setInlineMessageId(string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chatInstance;
    }

    /**
     * @param string $chatInstance
     */
    public function setChatInstance(string $chatInstance): void
    {
        $this->chatInstance = $chatInstance;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getGameShortName(): string
    {
        return $this->gameShortName;
    }

    /**
     * @param string $gameShortName
     */
    public function setGameShortName(string $gameShortName): void
    {
        $this->gameShortName = $gameShortName;
    }
}
