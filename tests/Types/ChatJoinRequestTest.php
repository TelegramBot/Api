<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatJoinRequest;

class ChatJoinRequestTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatJoinRequest::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'user_chat_id' => 10,
            'date' => 100500,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'user_chat_id' => 10,
            'date' => 100500,
            'bio' => 'bio',
            'invite_link' => ChatInviteLinkTest::getMinResponse(),
        ];
    }

    /**
     * @param ChatJoinRequest $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(10, $item->getUserChatId());
        $this->assertEquals(100500, $item->getDate());
        $this->assertNull($item->getBio());
        $this->assertNull($item->getInviteLink());
    }

    /**
     * @param ChatJoinRequest $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(10, $item->getUserChatId());
        $this->assertEquals(100500, $item->getDate());
        $this->assertEquals('bio', $item->getBio());
        $this->assertEquals(ChatInviteLinkTest::createMinInstance(), $item->getInviteLink());
    }
}
