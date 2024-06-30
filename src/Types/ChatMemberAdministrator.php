<?php

namespace TelegramBot\Api\Types;

class ChatMemberAdministrator extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['status', 'user', 'can_be_edited', 'is_anonymous', 'can_manage_chat', 'can_delete_messages', 'can_manage_video_chats', 'can_restrict_members', 'can_promote_members', 'can_change_info', 'can_invite_users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'status' => true,
        'user' => User::class,
        'can_be_edited' => true,
        'is_anonymous' => true,
        'can_manage_chat' => true,
        'can_delete_messages' => true,
        'can_manage_video_chats' => true,
        'can_restrict_members' => true,
        'can_promote_members' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_post_stories' => true,
        'can_edit_stories' => true,
        'can_delete_stories' => true,
        'can_post_messages' => true,
        'can_edit_messages' => true,
        'can_pin_messages' => true,
        'can_manage_topics' => true,
        'custom_title' => true,
    ];

    /**
     * True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool
     */
    protected $canBeEdited;

    /**
     * True, if the user's presence in the chat is hidden
     *
     * @var bool
     */
    protected $isAnonymous;

    /**
     * True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode
     *
     * @var bool
     */
    protected $canManageChat;

    /**
     * True, if the administrator can delete messages of other users
     *
     * @var bool
     */
    protected $canDeleteMessages;

    /**
     * True, if the administrator can manage video chats
     *
     * @var bool
     */
    protected $canManageVideoChats;

    /**
     * True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     *
     * @var bool
     */
    protected $canRestrictMembers;

    /**
     * True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly
     *
     * @var bool
     */
    protected $canPromoteMembers;

    /**
     * True, if the user is allowed to change the chat title, photo and other settings
     *
     * @var bool
     */
    protected $canChangeInfo;

    /**
     * True, if the user is allowed to invite new users to the chat
     *
     * @var bool
     */
    protected $canInviteUsers;

    /**
     * True, if the administrator can post stories to the chat
     *
     * @var bool|null
     */
    protected $canPostStories;

    /**
     * True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
     *
     * @var bool|null
     */
    protected $canEditStories;

    /**
     * True, if the administrator can delete stories posted by other users
     *
     * @var bool|null
     */
    protected $canDeleteStories;

    /**
     * Optional. True, if the administrator can post messages in the channel, or access channel statistics; for channels only
     *
     * @var bool|null
     */
    protected $canPostMessages;

    /**
     * Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
     *
     * @var bool|null
     */
    protected $canEditMessages;

    /**
     * Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     *
     * @var bool|null
     */
    protected $canPinMessages;

    /**
     * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     *
     * @var bool|null
     */
    protected $canManageTopics;

    /**
     * Optional. Custom title for this user
     *
     * @var string|null
     */
    protected $customTitle;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return bool
     */
    public function canBeEdited()
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     * @return void
     */
    public function setCanBeEdited($canBeEdited)
    {
        $this->canBeEdited = $canBeEdited;
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
     * @return void
     */
    public function setIsAnonymous($isAnonymous)
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return bool
     */
    public function canManageChat()
    {
        return $this->canManageChat;
    }

    /**
     * @param bool $canManageChat
     * @return void
     */
    public function setCanManageChat($canManageChat)
    {
        $this->canManageChat = $canManageChat;
    }

    /**
     * @return bool
     */
    public function canDeleteMessages()
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     * @return void
     */
    public function setCanDeleteMessages($canDeleteMessages)
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * @return bool
     */
    public function canManageVideoChats()
    {
        return $this->canManageVideoChats;
    }

    /**
     * @param bool $canManageVideoChats
     * @return void
     */
    public function setCanManageVideoChats($canManageVideoChats)
    {
        $this->canManageVideoChats = $canManageVideoChats;
    }

    /**
     * @return bool
     */
    public function canRestrictMembers()
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     * @return void
     */
    public function setCanRestrictMembers($canRestrictMembers)
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * @return bool
     */
    public function canPromoteMembers()
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     * @return void
     */
    public function setCanPromoteMembers($canPromoteMembers)
    {
        $this->canPromoteMembers = $canPromoteMembers;
    }

    /**
     * @return bool
     */
    public function canChangeInfo()
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     * @return void
     */
    public function setCanChangeInfo($canChangeInfo)
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * @return bool
     */
    public function canInviteUsers()
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     * @return void
     */
    public function setCanInviteUsers($canInviteUsers)
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * @return bool|null
     */
    public function canPostStories()
    {
        return $this->canPostStories;
    }

    /**
     * @param bool|null $canPostStories
     * @return void
     */
    public function setCanPostStories($canPostStories)
    {
        $this->canPostStories = $canPostStories;
    }

    /**
     * @return bool|null
     */
    public function canEditStories()
    {
        return $this->canEditStories;
    }

    /**
     * @param bool|null $canEditStories
     * @return void
     */
    public function setCanEditStories($canEditStories)
    {
        $this->canEditStories = $canEditStories;
    }

    /**
     * @return bool|null
     */
    public function canDeleteStories()
    {
        return $this->canDeleteStories;
    }

    /**
     * @param bool|null $canDeleteStories
     * @return void
     */
    public function setCanDeleteStories($canDeleteStories)
    {
        $this->canDeleteStories = $canDeleteStories;
    }

    /**
     * @return bool|null
     */
    public function canPostMessages()
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool|null $canPostMessages
     * @return void
     */
    public function setCanPostMessages($canPostMessages)
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * @return bool|null
     */
    public function canEditMessages()
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool|null $canEditMessages
     * @return void
     */
    public function setCanEditMessages($canEditMessages)
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * @return bool|null
     */
    public function canPinMessages()
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool|null $canPinMessages
     * @return void
     */
    public function setCanPinMessages($canPinMessages)
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool|null
     */
    public function canManageTopics()
    {
        return $this->canManageTopics;
    }

    /**
     * @param bool|null $canManageTopics
     * @return void
     */
    public function setCanManageTopics($canManageTopics)
    {
        $this->canManageTopics = $canManageTopics;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle()
    {
        return $this->customTitle;
    }

    /**
     * @param string|null $customTitle
     * @return void
     */
    public function setCustomTitle($customTitle)
    {
        $this->customTitle = $customTitle;
    }
}
