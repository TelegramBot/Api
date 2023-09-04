<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatMemberUpdated;

class ChatMemberUpdatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatMemberUpdated::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'date' => 100500,
            'old_chat_member' => ChatMemberTest::getMinResponse(),
            'new_chat_member' => ChatMemberTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'date' => 100500,
            'old_chat_member' => ChatMemberTest::getMinResponse(),
            'new_chat_member' => ChatMemberTest::getMinResponse(),
            'invite_link' => ChatInviteLinkTest::getMinResponse(),
            'via_chat_folder_invite_link' => true,
        ];
    }

    /**
     * @param ChatMemberUpdated $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(100500, $item->getDate());
        $this->assertEquals(ChatMemberTest::createMinInstance(), $item->getOldChatMember());
        $this->assertEquals(ChatMemberTest::createMinInstance(), $item->getNewChatMember());
        $this->assertNull($item->getInviteLink());
        $this->assertNull($item->getViaChatFolderInviteLink());
    }

    /**
     * @param ChatMemberUpdated $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(100500, $item->getDate());
        $this->assertEquals(ChatMemberTest::createMinInstance(), $item->getOldChatMember());
        $this->assertEquals(ChatMemberTest::createMinInstance(), $item->getNewChatMember());
        $this->assertEquals(ChatInviteLinkTest::createMinInstance(), $item->getInviteLink());
        $this->assertTrue($item->getViaChatFolderInviteLink());
    }
}
