<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Represents a join request sent to a chat.
 */
class ChatJoinRequest extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    static protected $requiredParams = ['chat', 'from', 'date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'date' => true,
        'bio' => true,
        'invite_link' => ChatInviteLink::class,
    ];

    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @var User
     */
    protected $from;

    /**
     * @var integer
     */
    protected $date;

    /**
     * @var string
     */
    protected $bio;
    /**
     * @var ChatInviteLink
     */
    protected $inviteLink;

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
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
    public function setFrom($from)
    {
        $this->from = $from;
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
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return ChatInviteLink
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param ChatInviteLink $inviteLink
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
    }


}
