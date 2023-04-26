<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatPermissions;

class ChatPermissionsTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatPermissions::class;
    }

    public static function getMinResponse()
    {
        return [];
    }

    public static function getFullResponse()
    {
        return [
            'can_send_messages' => true,
            'can_send_media_messages' => true,
            'can_send_polls' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_pin_messages' => true,
        ];
    }

    /**
     * @param ChatPermissions $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertNull($item->isCanSendMessages());
        $this->assertNull($item->isCanSendMediaMessages());
        $this->assertNull($item->isCanSendPolls());
        $this->assertNull($item->isCanSendOtherMessages());
        $this->assertNull($item->isCanAddWebPagePreviews());
        $this->assertNull($item->isCanChangeInfo());
        $this->assertNull($item->isCanInviteUsers());
        $this->assertNull($item->isCanPinMessages());
    }

    /**
     * @param ChatPermissions $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertTrue($item->isCanSendMessages());
        $this->assertTrue($item->isCanSendMediaMessages());
        $this->assertTrue($item->isCanSendPolls());
        $this->assertTrue($item->isCanSendOtherMessages());
        $this->assertTrue($item->isCanAddWebPagePreviews());
        $this->assertTrue($item->isCanChangeInfo());
        $this->assertTrue($item->isCanInviteUsers());
        $this->assertTrue($item->isCanPinMessages());
    }
}
