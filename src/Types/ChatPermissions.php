<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatPermissions extends BaseType
{

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'can_send_messages' => true,
        'can_send_media_messages' => true,
        'can_send_polls' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_pin_messages' => true
    ];

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues
     *
     * @var bool|null
     */
    protected $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     *
     * @var bool|null
     */
    protected $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages
     *
     * @var bool|null
     */
    protected $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies can_send_media_messages
     *
     * @var bool|null
     */
    protected $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages
     *
     * @var bool|null
     */
    protected $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     *
     * @var bool|null
     */
    protected $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat
     *
     * @var bool|null
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     *
     * @var bool|null
     */
    protected $canPinMessages;

    /**
     * @return bool|null
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     * @return ChatPermissions
     */
    public function setCanSendMessages(bool $canSendMessages): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanSendPolls(bool $canSendPolls): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanSendOtherMessages(bool $canSendOtherMessages): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): ChatPermissions
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;

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
     * @return ChatPermissions
     */
    public function setCanChangeInfo(bool $canChangeInfo): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanInviteUsers(bool $canInviteUsers): ChatPermissions
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
     * @return ChatPermissions
     */
    public function setCanPinMessages(bool $canPinMessages): ChatPermissions
    {
        $this->canPinMessages = $canPinMessages;

        return $this;
    }
}
