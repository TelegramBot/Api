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
    protected static $requiredParams = ['chat', 'from', 'date', 'old_chat_member', 'new_chat_member'];

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
        'via_chat_folder_invite_link' => true,
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
     * Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     *
     * @var ChatInviteLink|null
     */
    protected $inviteLink;

    /**
     * Optional. True, if the user joined the chat via a chat folder invite link
     *
     * @var bool|null
     */
    protected $viaChatFolderInviteLink;

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
     * @return ChatMember
     */
    public function getOldChatMember()
    {
        return $this->oldChatMember;
    }

    /**
     * @param ChatMember $oldChatMember
     * @return void
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
     * @return void
     */
    public function setNewChatMember($newChatMember)
    {
        $this->newChatMember = $newChatMember;
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

    /**
     * @return bool|null
     */
    public function getViaChatFolderInviteLink()
    {
        return $this->viaChatFolderInviteLink;
    }

    /**
     * @param bool|null $viaChatFolderInviteLink
     * @return void
     */
    public function setViaChatFolderInviteLink($viaChatFolderInviteLink)
    {
        $this->viaChatFolderInviteLink = $viaChatFolderInviteLink;
    }
}
