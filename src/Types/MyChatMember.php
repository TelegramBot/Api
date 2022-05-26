<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class MyChatMember extends BaseType implements TypeInterface
{
    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @var User
     */
    protected $from;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var NewChatMember
     */
    protected $newChatMember;

    /**
     * @var OldChatMember
     */
    protected $oldChatMember;

    /**
     * @var array
     */
    static protected $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'date' => true,
        'new_chat_member' => NewChatMember::class,
        'old_chat_member' => OldChatMember::class,
    ];

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
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return NewChatMember
     */
    public function getNewChatMember()
    {
        return $this->newChatMember;
    }

    /**
     * @param NewChatMember $newChatMember
     */
    public function setNewChatMember($newChatMember)
    {
        $this->newChatMember = $newChatMember;
    }

    /**
     * @return OldChatMember
     */
    public function getOldChatMember()
    {
        return $this->oldChatMember;
    }

    /**
     * @param OldChatMember $oldChatMember
     */
    public function setOldChatMember($oldChatMember)
    {
        $this->oldChatMember = $oldChatMember;
    }
}
