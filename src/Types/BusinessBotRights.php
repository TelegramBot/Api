<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class BusinessBotRights
 * Represents the rights of a business bot.
 */
class BusinessBotRights extends BaseType implements TypeInterface
{
    protected static $map = [
        'can_reply' => true,
        'can_read_messages' => true,
        'can_delete_sent_messages' => true,
        'can_delete_all_messages' => true,
        'can_edit_name' => true,
        'can_edit_bio' => true,
        'can_edit_profile_photo' => true,
        'can_edit_username' => true,
        'can_change_gift_settings' => true,
        'can_view_gifts_and_stars' => true,
        'can_convert_gifts_to_stars' => true,
        'can_transfer_and_upgrade_gifts' => true,
        'can_transfer_stars' => true,
        'can_manage_stories' => true
    ];

    protected $canReply;
    protected $canReadMessages;
    protected $canDeleteSentMessages;
    protected $canDeleteAllMessages;
    protected $canEditName;
    protected $canEditBio;
    protected $canEditProfilePhoto;
    protected $canEditUsername;
    protected $canChangeGiftSettings;
    protected $canViewGiftsAndStars;
    protected $canConvertGiftsToStars;
    protected $canTransferAndUpgradeGifts;
    protected $canTransferStars;
    protected $canManageStories;

    public function getCanReply()
    {
        return $this->canReply;
    }

    public function setCanReply($value)
    {
        $this->canReply = $value;
    }
}
