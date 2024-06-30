<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class MessageReactionUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'message_id', 'date', 'old_reaction', 'new_reaction'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'user' => User::class,
        'actor_chat' => Chat::class,
        'date' => true,
        'old_reaction' => ArrayOfReactionType::class,
        'new_reaction' => ArrayOfReactionType::class,
    ];

    /**
     * The chat containing the message the user reacted to
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Unique identifier of the message inside the chat
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. The user that changed the reaction, if the user isn't anonymous
     *
     * @var User|null
     */
    protected $user;

    /**
     * Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     *
     * @var Chat|null
     */
    protected $actorChat;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Previous list of reaction types that were set by the user
     *
     * @var array
     */
    protected $oldReaction;

    /**
     * New list of reaction types that have been set by the user
     *
     * @var array
     */
    protected $newReaction;

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
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Chat|null
     */
    public function getActorChat()
    {
        return $this->actorChat;
    }

    /**
     * @param Chat|null $actorChat
     * @return void
     */
    public function setActorChat($actorChat)
    {
        $this->actorChat = $actorChat;
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
    public function getOldReaction()
    {
        return $this->oldReaction;
    }

    /**
     * @param array $oldReaction
     * @return void
     */
    public function setOldReaction($oldReaction)
    {
        $this->oldReaction = $oldReaction;
    }

    /**
     * @return array
     */
    public function getNewReaction()
    {
        return $this->newReaction;
    }

    /**
     * @param array $newReaction
     * @return void
     */
    public function setNewReaction($newReaction)
    {
        $this->newReaction = $newReaction;
    }
}
