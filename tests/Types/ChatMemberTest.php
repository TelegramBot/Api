<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatMember;

class ChatMemberTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatMember::class;
    }

    public static function getMinResponse()
    {
        return [
            'user' => UserTest::getMinResponse(),
            'status' => 'member',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'user' => UserTest::getMinResponse(),
            'status' => 'member',
            'until_date' => 1682343644,
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
            'custom_title' => 'custom_title',
            'can_manage_chat' => true,
            'can_send_polls' => true,
        ];
    }

    /**
     * @param ChatMember $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals('member', $item->getStatus());
        $this->assertNull($item->getUntilDate());
        $this->assertNull($item->getCanBeEdited());
        $this->assertNull($item->getCanChangeInfo());
        $this->assertNull($item->getCanPostMessages());
        $this->assertNull($item->getCanEditMessages());
        $this->assertNull($item->getCanDeleteMessages());
        $this->assertNull($item->getCanInviteUsers());
        $this->assertNull($item->getCanRestrictMembers());
        $this->assertNull($item->getCanPinMessages());
        $this->assertNull($item->getCanPromoteMembers());
        $this->assertNull($item->getCanSendMessages());
        $this->assertNull($item->getCanSendMediaMessages());
        $this->assertNull($item->getCanSendOtherMessages());
        $this->assertNull($item->getCanAddWebPagePreviews());
        $this->assertNull($item->getCanManageTopics());
        $this->assertNull($item->getIsAnonymous());
        $this->assertNull($item->getCustomTitle());
        $this->assertNull($item->getCanManageChat());
        $this->assertNull($item->getCanSendPolls());
    }

    /**
     * @param ChatMember $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1682343644, $item->getUntilDate());
        $this->assertTrue($item->getCanBeEdited());
        $this->assertTrue($item->getCanChangeInfo());
        $this->assertTrue($item->getCanPostMessages());
        $this->assertTrue($item->getCanEditMessages());
        $this->assertTrue($item->getCanDeleteMessages());
        $this->assertTrue($item->getCanInviteUsers());
        $this->assertTrue($item->getCanRestrictMembers());
        $this->assertTrue($item->getCanPinMessages());
        $this->assertTrue($item->getCanPromoteMembers());
        $this->assertTrue($item->getCanSendMessages());
        $this->assertTrue($item->getCanSendMediaMessages());
        $this->assertTrue($item->getCanSendOtherMessages());
        $this->assertTrue($item->getCanAddWebPagePreviews());
        $this->assertTrue($item->getCanManageTopics());
        $this->assertTrue($item->getIsAnonymous());
        $this->assertEquals('custom_title', $item->getCustomTitle());
        $this->assertTrue($item->getCanManageChat());
        $this->assertTrue($item->getCanSendPolls());
    }
}
