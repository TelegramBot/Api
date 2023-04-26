<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatMemberUpdated
 * This object represents changes in the status of a chat member.
 *
 * @package TelegramBot\Api\Types
 */
class ChatMemberUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [
        'chat',
        'from',
        'date',
        'old_chat_member',
        'new_chat_member',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'date' => true,
        'old_chat_member' => ChatMember::class,
        'new_chat_member' => ChatMember::class,
        'invite_link' => ChatInviteLink::class,
    ];

    /**
     * Chat the user belongs to
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Performer of the action, which resulted in the change
     *
     * @var User
     */
    protected $from;

    /**
     * Date the change was done in Unix time
     *
     * @var Integer
     */
    protected $date;

    /**
     * Previous information about the chat member
     *
     * @var ChatMember
     */
    protected $old_chat_member;

    /**
     * New information about the chat member
     *
     * @var ChatMember
     */
    protected $new_chat_member;

    /**
     * Optional. Chat invite link, which was used by the user to join the chat;
     * for joining by invite link events only.
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
     * @return ChatMember
     */
    public function getOldChatMember()
    {
        return $this->old_chat_member;
    }

    /**
     * @param ChatMember $old_chat_member
     */
    public function setOldChatMember($old_chat_member)
    {
        $this->old_chat_member = $old_chat_member;
    }

    /**
     * @return ChatMember
     */
    public function getNewChatMember()
    {
        return $this->new_chat_member;
    }

    /**
     * @param ChatMember $new_chat_member
     */
    public function setNewChatMember($new_chat_member)
    {
        $this->new_chat_member = $new_chat_member;
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
