<?php


namespace TelegramBot\Api\Types;


use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ChatMemberUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = [
        'chat',
        'from',
        'date',
        'old_chat_member',
        'new_chat_member'
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
     * @var int
     */
    protected $date;

    /**
     * Previous information about the chat member
     *
     * @var ChatMember
     */
    protected $oldChatMember;

    /**
     * New information about the chat member
     *
     * @var ChatMember
     */
    protected $newChatMember;

    /**
     * Chat invite link, which was used by the user to join the chat;
     * for joining by invite link events only.
     *
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
     * @return ChatMember
     */
    public function getOldChatMember()
    {
        return $this->oldChatMember;
    }

    /**
     * @param ChatMember $oldChatMember
     */
    public function setOldChatMember($oldChatMember)
    {
        $this->oldChatMember = $oldChatMember;
    }

    /**
     * @return ChatMember
     */
    public function getNewChatMember()
    {
        return $this->newChatMember;
    }

    /**
     * @param ChatMember $newChatMember
     */
    public function setNewChatMember($newChatMember)
    {
        $this->newChatMember = $newChatMember;
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
