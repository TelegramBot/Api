<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ChatJoinRequest extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'from', 'user_chat_id', 'date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'user_chat_id' => true,
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
     * Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this identifier for 24 hours to send messages until the join request is processed, assuming no other administrator contacted the user.
     *
     * @var int
     */
    protected $userChatId;

    /**
     * Date the request was sent in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Optional. Bio of the user.
     *
     * @var string|null
     */
    protected $bio;

    /**
     * Optional. Chat invite link that was used by the user to send the join request
     *
     * @var ChatInviteLink|null
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
     * @return void
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
     * @return void
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getUserChatId()
    {
        return $this->userChatId;
    }

    /**
     * @param int $userChatId
     * @return void
     */
    public function setUserChatId($userChatId)
    {
        $this->userChatId = $userChatId;
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
     * @return string|null
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     * @return void
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param ChatInviteLink|null $inviteLink
     * @return void
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
    }
}
