<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ChatPermissions extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    protected static array $requiredParams = [];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'can_send_messages' => true,
        'can_send_media_messages' => true,
        'can_send_polls' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_pin_messages' => true,
    ];

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues
     *
     * @var bool
     */
    protected bool $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages
     *
     * @var bool
     */
    protected bool $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages
     *
     * @var bool
     */
    protected bool $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies
     * can_send_media_messages
     *
     * @var bool
     */
    protected $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages, implies
     * can_send_media_messages
     *
     * @var bool
     */
    protected bool $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public
     * supergroups
     *
     * @var bool
     */
    protected bool $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat
     *
     * @var bool
     */
    protected bool $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     *
     * @var bool
     */
    protected bool $canPinMessages;

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
    public function isCanSendPolls(): bool
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendPolls
     */
    public function setCanSendPolls(bool $canSendPolls): void
    {
        $this->canSendPolls = $canSendPolls;
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
}
