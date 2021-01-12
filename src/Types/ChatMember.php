<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatMember extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['user', 'status'];

    /**
     * @var array
     */
    protected static array $map = [
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
        'can_add_web_page_previews' => true
    ];

    /**
     * Information about the user
     *
     * @var User
     */
    protected User $user;

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     *
     * @var string
     */
    protected string $status;

    /**
     * Optional. Restictred and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @var integer
     */
    protected int $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool
     */
    protected bool $canBeEdited;

    /**
     * Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @var bool
     */
    protected bool $canChangeInfo;

    /**
     * Optional. Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @var bool
     */
    protected bool $canPostMessages;

    /**
     * Optional. Administrators only. True, if the administrator can edit messages of other users, channels only
     *
     * @var bool
     */
    protected bool $canEditMessages;

    /**
     * Optional. Administrators only. True, if the administrator can delete messages of other users
     *
     * @var bool
     */
    protected bool $canDeleteMessages;

    /**
     * Optional. Administrators only. True, if the administrator can invite new users to the chat
     *
     * @var bool
     */
    protected bool $canInviteUsers;

    /**
     * Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool
     */
    protected bool $canRestrictMembers;

    /**
     * Optional. Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @var bool
     */
    protected bool $canPinMessages;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own
     * privileges or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by the user)
     *
     * @var bool
     */
    protected bool $canPromoteMembers;

    /**
     * Optional. Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @var bool
     */
    protected bool $canSendMessages;

    /**
     * Optional. Restricted only. True, if the user can send audios, documents, photos, videos, video notes
     * and voice notes, implies can_send_messages
     *
     * @var bool
     */
    protected bool $canSendMediaMessages;

    /**
     * Optional. Restricted only. True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages
     *
     * @var bool
     */
    protected bool $canSendOtherMessages;

    /**
     * Optional. Restricted only. True, if user may add web page previews to his messages,
     * implies can_send_media_messages
     *
     * @var bool
     */
    protected bool $canAddWebPagePreviews;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     */
    public function setUntilDate(int $untilDate): void
    {
        $this->untilDate = $untilDate;
    }

    /**
     * @return bool
     */
    public function isCanBeEdited(): bool
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     */
    public function setCanBeEdited(bool $canBeEdited): void
    {
        $this->canBeEdited = $canBeEdited;
    }

    /**
     * @return bool
     */
    public function isCanChangeInfo(): bool
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     */
    public function setCanChangeInfo(bool $canChangeInfo): void
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * @return bool
     */
    public function isCanPostMessages(): bool
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canPostMessages
     */
    public function setCanPostMessages(bool $canPostMessages): void
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * @return bool
     */
    public function isCanEditMessages(): bool
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canEditMessages
     */
    public function setCanEditMessages(bool $canEditMessages): void
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * @return bool
     */
    public function isCanDeleteMessages(): bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): void
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * @return bool
     */
    public function isCanInviteUsers(): bool
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     */
    public function setCanInviteUsers(bool $canInviteUsers): void
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * @return bool
     */
    public function isCanRestrictMembers(): bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     */
    public function setCanRestrictMembers(bool $canRestrictMembers): void
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * @return bool
     */
    public function isCanPinMessages(): bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool $canPinMessages
     */
    public function setCanPinMessages(bool $canPinMessages): void
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool
     */
    public function isCanPromoteMembers(): bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     */
    public function setCanPromoteMembers(bool $canPromoteMembers): void
    {
        $this->canPromoteMembers = $canPromoteMembers;
    }

    /**
     * @return bool
     */
    public function isCanSendMessages(): bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     */
    public function setCanSendMessages(bool $canSendMessages): void
    {
        $this->canSendMessages = $canSendMessages;
    }

    /**
     * @return bool
     */
    public function isCanSendMediaMessages(): bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): void
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
    }

    /**
     * @return bool
     */
    public function isCanSendOtherMessages(): bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canSendOtherMessages
     */
    public function setCanSendOtherMessages(bool $canSendOtherMessages): void
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
    }

    /**
     * @return bool
     */
    public function isCanAddWebPagePreviews(): bool
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @param bool $canAddWebPagePreviews
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): void
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
    }
}
