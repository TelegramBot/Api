<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ChatJoinRequest
 * Represents a join request sent to a chat.
 *
 * @package TelegramBot\Api\Types
 */
class ChatJoinRequest extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = [
        'chat',
        'from',
        'date',
    ];

    /**
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
     * Chat to which the request was sent
     *
     * @var Chat
     */
    protected $chat;

    /**
     * User that sent the join request
     *
     * @var User
     */
    protected $from;

    /**
     * Date the request was sent in Unix time
     *
     * @var integer
     */
    protected $date;

    /**
     * Optional. Bio of the user
     *
     * @var string
     */
    protected $bio;

    /**
     * Optional. Chat invite link that was used by the user to send the join request
     *
     * @var ChatInviteLink
     */
    protected $invite_link;

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
        return $this->invite_link;
    }

    /**
     * @param ChatInviteLink $invite_link
     */
    public function setInviteLink($invite_link)
    {
        $this->invite_link = $invite_link;
    }

}
