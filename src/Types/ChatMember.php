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
    static protected $requiredParams = ['user', 'status'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'user' => User::class,
        'status' => true,
        'until_date' => true,
        'can_be_edited' => true,
        'can_post_messages' => true,
        'can_edit_messages' => true,
        'can_delete_messages' => true,
        'can_restrict_members' => true,
        'can_promote_members' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_pin_messages' => true,
        'is_member' => true,
        'can_send_messages' => true,
        'can_send_media_messages' => true,
        'can_send_polls' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true
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
     * Optional. Restricted and kicked only. Date when restrictions will be lifted for this user; unix time
     *
     * @var int|null
     */
    protected $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool|null
     */
    protected $canBeEdited;

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
     * Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool|null
     */
    protected $canRestrictMembers;
    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own
     * privileges or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by the user)
     *
     * @var bool|null
     */
    protected $canPromoteMembers;

    /**
     * Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @var bool|null
     */
    protected $canChangeInfo;

    /**
     * Optional. Administrators only. True, if the administrator can invite new users to the chat
     *
     * @var bool|null
     */
    protected $canInviteUsers;

    /**
     * Optional. Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @var bool|null
     */
    protected $canPinMessages;

    /**
     * Optional. Restricted only. True, if the user is a member of the chat at the moment of the request
     *
     * @var bool|null
     */
    protected $isMember;

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
     * Optional. Restricted only. True, if the user is allowed to send polls
     *
     * @var bool|null
     */
    protected $canSendPolls;

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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return ChatMember
     */
    public function setUser(User $user): ChatMember
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ChatMember
     */
    public function setStatus(string $status): ChatMember
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUntilDate(): ?int
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     * @return ChatMember
     */
    public function setUntilDate(int $untilDate): ChatMember
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanBeEdited(): ?bool
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     * @return ChatMember
     */
    public function setCanBeEdited(bool $canBeEdited): ChatMember
    {
        $this->canBeEdited = $canBeEdited;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPostMessages(): ?bool
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canPostMessages
     * @return ChatMember
     */
    public function setCanPostMessages(bool $canPostMessages): ChatMember
    {
        $this->canPostMessages = $canPostMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanEditMessages(): ?bool
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canEditMessages
     * @return ChatMember
     */
    public function setCanEditMessages(bool $canEditMessages): ChatMember
    {
        $this->canEditMessages = $canEditMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanDeleteMessages(): ?bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     * @return ChatMember
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): ChatMember
    {
        $this->canDeleteMessages = $canDeleteMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanRestrictMembers(): ?bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     * @return ChatMember
     */
    public function setCanRestrictMembers(bool $canRestrictMembers): ChatMember
    {
        $this->canRestrictMembers = $canRestrictMembers;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPromoteMembers(): ?bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     * @return ChatMember
     */
    public function setCanPromoteMembers(bool $canPromoteMembers): ChatMember
    {
        $this->canPromoteMembers = $canPromoteMembers;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanChangeInfo(): ?bool
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     * @return ChatMember
     */
    public function setCanChangeInfo(bool $canChangeInfo): ChatMember
    {
        $this->canChangeInfo = $canChangeInfo;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanInviteUsers(): ?bool
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     * @return ChatMember
     */
    public function setCanInviteUsers(bool $canInviteUsers): ChatMember
    {
        $this->canInviteUsers = $canInviteUsers;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool $canPinMessages
     * @return ChatMember
     */
    public function setCanPinMessages(bool $canPinMessages): ChatMember
    {
        $this->canPinMessages = $canPinMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isMember(): ?bool
    {
        return $this->isMember;
    }

    /**
     * @param bool $isMember
     * @return ChatMember
     */
    public function setIsMember(bool $isMember): ChatMember
    {
        $this->isMember = $isMember;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     * @return ChatMember
     */
    public function setCanSendMessages(bool $canSendMessages): ChatMember
    {
        $this->canSendMessages = $canSendMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendMediaMessages(): ?bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     * @return ChatMember
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): ChatMember
    {
        $this->canSendMediaMessages = $canSendMediaMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPolls(): ?bool
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendPolls
     * @return ChatMember
     */
    public function setCanSendPolls(bool $canSendPolls): ChatMember
    {
        $this->canSendPolls = $canSendPolls;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canSendOtherMessages
     * @return ChatMember
     */
    public function setCanSendOtherMessages(?bool $canSendOtherMessages): ChatMember
    {
        $this->canSendOtherMessages = $canSendOtherMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @param bool $canAddWebPagePreviews
     * @return ChatMember
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): ChatMember
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;

        return $this;
    }
}
