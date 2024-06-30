<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class MessageReactionCountUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'message_id', 'date', 'reactions'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'date' => true,
        'reactions' => ArrayOfReactionType::class,
    ];

    /**
     * The chat containing the message
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Unique message identifier inside the chat
     *
     * @var int
     */
    protected $messageId;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * List of reactions that are present on the message
     *
     * @var array
     */
    protected $reactions;

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function getReactions()
    {
        return $this->reactions;
    }

    /**
     * @param array $reactions
     * @return void
     */
    public function setReactions($reactions)
    {
        $this->reactions = $reactions;
    }
}
