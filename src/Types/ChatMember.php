<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatMember extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['user', 'status'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'user' => User::class,
        'status' => true,
        'until_date' => true,
        'can_be_edited' => true,
        'can_change_info' => true,
        'can_post_messages' => true,
        'can_edit_messages' => true,
        'can_delete_messages' => true,
        'can_invite_users' => true,
        'can_restrict_members' => true,
        'can_pin_messages' => true,
        'can_promote_members' => true,
        'can_send_messages' => true,
        'can_send_media_messages' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true,
        'can_manage_topics' => true,
        'is_anonymous' => true,
        'custom_title' => true,
        'can_manage_chat' => true,
        'can_send_polls' => true,
    ];

    /**
     * Information about the user
     *
     * @var User
     */
    protected $user;

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     *
     * @var string
     */
    protected $status;

    /**
     * Optional. Restricted and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @var integer|null
     */
    protected $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool|null
     */
    protected $canBeEdited;

    /**
     * Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @var bool|null
     */
    protected $canChangeInfo;

    /**
     * Optional. Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @var bool|null
     */
    protected $canPostMessages;

    /**
     * Optional. Administrators only. True, if the administrator can edit messages of other users, channels only
     *
     * @var bool|null
     */
    protected $canEditMessages;

    /**
     * Optional. Administrators only. True, if the administrator can delete messages of other users
     *
     * @var bool|null
     */
    protected $canDeleteMessages;

    /**
     * Optional. Administrators only. True, if the administrator can invite new users to the chat
     *
     * @var bool|null
     */
    protected $canInviteUsers;

    /**
     * Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool|null
     */
    protected $canRestrictMembers;

    /**
     * Optional. Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @var bool|null
     */
    protected $canPinMessages;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own
     * privileges or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by the user)
     *
     * @var bool|null
     */
    protected $canPromoteMembers;

    /**
     * Optional. Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @var bool|null
     */
    protected $canSendMessages;

    /**
     * Optional. Restricted only. True, if the user can send audios, documents, photos, videos, video notes
     * and voice notes, implies can_send_messages
     *
     * @var bool|null
     */
    protected $canSendMediaMessages;

    /**
     * Optional. Restricted only. True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages
     *
     * @var bool|null
     */
    protected $canSendOtherMessages;

    /**
     * Optional. Restricted only. True, if user may add web page previews to his messages,
     * implies can_send_media_messages
     *
     * @var bool|null
     */
    protected $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
     *
     * @var bool|null
     */
    protected $canManageTopics;

    /**
     * True, if the user's presence in the chat is hidden
     *
     * @var bool
     */
    protected $isAnonymous;

    /**
     * Optional. Custom title for this user
     *
     * @var string|null
     */
    protected $customTitle;

    /**
     * True, if the administrator can access the chat event log, chat statistics, message statistics in channels,
     * see channel members, see anonymous administrators in supergroups and ignore slow mode.
     * Implied by any other administrator privilege
     *
     * @var bool
     */
    protected $canManageChat;

    /**
     * True, if the user is allowed to send polls
     *
     * @var bool
     */
    protected $canSendPolls;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return void
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
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     * @return void
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
    }

    /**
     * @return bool|null
     */
    public function getCanBeEdited()
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
     * @return bool|null
     */
    public function getCanChangeInfo()
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
     * @return bool|null
     */
    public function getCanPostMessages()
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canPostMessages
     * @return void
     */
    public function setCanPostMessages($canPostMessages)
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanEditMessages()
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canEditMessages
     * @return void
     */
    public function setCanEditMessages($canEditMessages)
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanDeleteMessages()
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
     * @return bool|null
     */
    public function getCanInviteUsers()
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
    public function getCanRestrictMembers()
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
     * @return bool|null
     */
    public function getCanPinMessages()
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool $canPinMessages
     * @return void
     */
    public function setCanPinMessages($canPinMessages)
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanPromoteMembers()
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
     * @return bool|null
     */
    public function getCanSendMessages()
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     * @return void
     */
    public function setCanSendMessages($canSendMessages)
    {
        $this->canSendMessages = $canSendMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanSendMediaMessages()
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     * @return void
     */
    public function setCanSendMediaMessages($canSendMediaMessages)
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanSendOtherMessages()
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canSendOtherMessages
     * @return void
     */
    public function setCanSendOtherMessages($canSendOtherMessages)
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanAddWebPagePreviews()
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @param bool $canAddWebPagePreviews
     * @return void
     */
    public function setCanAddWebPagePreviews($canAddWebPagePreviews)
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
    }

    /**
     * @return bool
     */
    public function getCanManageChat()
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
    public function getIsAnonymous()
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
    public function getCanSendPolls()
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendPolls
     * @return void
     */
    public function setCanSendPolls($canSendPolls)
    {
        $this->canSendPolls = $canSendPolls;
    }

    /**
     * @return bool|null
     */
    public function getCanManageTopics()
    {
        return $this->canManageTopics;
    }

    /**
     * @param bool $canManageTopics
     * @return void
     */
    public function setCanManageTopics($canManageTopics)
    {
        $this->canManageTopics = $canManageTopics;
    }

    /**
     * @return null|string
     */
    public function getCustomTitle()
    {
        return $this->customTitle;
    }

    /**
     * @param string $customTitle
     * @return void
     */
    public function setCustomTitle($customTitle)
    {
        $this->customTitle = $customTitle;
    }
}
