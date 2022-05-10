<?php


namespace TelegramBot\Api\Types;


use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class NewChatMember extends BaseType implements TypeInterface
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var boolean
     */
    protected $canBeEdited;

    /**
     * @var boolean
     */
    protected $canManageChat;

    /**
     * @var boolean
     */
    protected $canChangeInfo;

    /**
     * @var boolean
     */
    protected $canPostMessages;

    /**
     * @var boolean
     */
    protected $canEditMessages;

    /**
     * @var boolean
     */
    protected $canDeleteMessages;

    /**
     * @var boolean
     */
    protected $canInviteUsers;

    /**
     * @var boolean
     */
    protected $canRestrictMembers;

    /**
     * @var boolean
     */
    protected $canPromoteMembers;

    /**
     * @var boolean
     */
    protected $canManageVideoChats;

    /**
     * @var boolean
     */
    protected $isAnonymous;

    /**
     * @var boolean
     */
    protected $canManageVoiceChats;

    /**
     * @var array
     */
    static protected $map = [
        'user' => User::class,
        'status' => true,
        'can_be_edited' => true,
        'can_manage_chat' => true,
        'can_change_info' => true,
        'can_post_messages' => true,
        'can_edit_messages' => true,
        'can_delete_messages' => true,
        'can_invite_users' => true,
        'can_restrict_members' => true,
        'can_promote_members' => true,
        'can_manage_video_chats' => true,
        'is_anonymous' => true,
        'can_manage_voice_chats' => true
    ];

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isCanBeEdited()
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     */
    public function setCanBeEdited($canBeEdited)
    {
        $this->canBeEdited = $canBeEdited;
    }

    /**
     * @return bool
     */
    public function isCanManageChat()
    {
        return $this->canManageChat;
    }

    /**
     * @param bool $canManageChat
     */
    public function setCanManageChat($canManageChat)
    {
        $this->canManageChat = $canManageChat;
    }

    /**
     * @return bool
     */
    public function isCanChangeInfo()
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     */
    public function setCanChangeInfo($canChangeInfo)
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * @return bool
     */
    public function isCanPostMessages()
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canPostMessages
     */
    public function setCanPostMessages($canPostMessages)
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * @return bool
     */
    public function isCanEditMessages()
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canEditMessages
     */
    public function setCanEditMessages($canEditMessages)
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * @return bool
     */
    public function isCanDeleteMessages()
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     */
    public function setCanDeleteMessages($canDeleteMessages)
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * @return bool
     */
    public function isCanInviteUsers()
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     */
    public function setCanInviteUsers($canInviteUsers)
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * @return bool
     */
    public function isCanRestrictMembers()
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     */
    public function setCanRestrictMembers($canRestrictMembers)
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * @return bool
     */
    public function isCanPromoteMembers()
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     */
    public function setCanPromoteMembers($canPromoteMembers)
    {
        $this->canPromoteMembers = $canPromoteMembers;
    }

    /**
     * @return bool
     */
    public function isCanManageVideoChats()
    {
        return $this->canManageVideoChats;
    }

    /**
     * @param bool $canManageVideoChats
     */
    public function setCanManageVideoChats($canManageVideoChats)
    {
        $this->canManageVideoChats = $canManageVideoChats;
    }

    /**
     * @return bool
     */
    public function isAnonymous()
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     */
    public function setIsAnonymous($isAnonymous)
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return bool
     */
    public function isCanManageVoiceChats()
    {
        return $this->canManageVoiceChats;
    }

    /**
     * @param bool $canManageVoiceChats
     */
    public function setCanManageVoiceChats($canManageVoiceChats)
    {
        $this->canManageVoiceChats = $canManageVoiceChats;
    }
}
