<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatPermissions extends BaseType
{
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
     * @var bool
     */
    protected $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     *
     * @var bool
     */
    protected $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages
     *
     * @var bool
     */
    protected $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies can_send_media_messages
     *
     * @var bool
     */
    protected $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages
     *
     * @var bool
     */
    protected $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     *
     * @var bool
     */
    protected $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat
     *
     * @var bool
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     *
     * @var bool
     */
    protected $canPinMessages;

    /**
     * @param bool $canSendMessages
     */
    public function setCanSendMessages($canSendMessages)
    {
        $this->canSendMessages = $canSendMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     */
    public function setCanSendMediaMessages($canSendMediaMessages)
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
    }

    /**
     * @param bool $canSendPolls
     */
    public function setCanSendPolls($canSendPolls)
    {
        $this->canSendPolls = $canSendPolls;
    }

    /**
     * @param bool $canSendOtherMessages
     */
    public function setCanSendOtherMessages($canSendOtherMessages)
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
    }

    /**
     * @param bool $canAddWebPagePreviews
     */
    public function setCanAddWebPagePreviews($canAddWebPagePreviews)
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
    }

    /**
     * @param bool $canChangeInfo
     */
    public function setCanChangeInfo($canChangeInfo)
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * @param bool $canInviteUsers
     */
    public function setCanInviteUsers($canInviteUsers)
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * @param bool $canPinMessages
     */
    public function setCanPinMessages($canPinMessages)
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool
     */
    public function getCanSendMessages()
    {
        return $this->canSendMessages;
    }

    /**
     * @return bool
     */
    public function getCanSendMediaMessages()
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @return bool
     */
    public function getCanSendPolls()
    {
        return $this->canSendPolls;
    }

    /**
     * @return bool
     */
    public function getCanSendOtherMessages()
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @return bool
     */
    public function getCanAddWebPagePreviews()
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @return bool
     */
    public function getCanChangeInfo()
    {
        return $this->canChangeInfo;
    }

    /**
     * @return bool
     */
    public function getCanInviteUsers()
    {
        return $this->canInviteUsers;
    }

    /**
     * @return bool
     */
    public function getCanPinMessages()
    {
        return $this->canPinMessages;
    }
}