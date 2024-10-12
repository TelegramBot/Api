<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\BusinessConnection;

class BusinessConnectionTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return BusinessConnection::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 1,
            'user' => UserTest::getMinResponse(),
            'user_chat_id' => 1,
            'date' => 1682343643,
            'can_reply' => true,
            'is_enabled' => true
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 1,
            'user' => UserTest::getMinResponse(),
            'user_chat_id' => 1,
            'date' => 1682343643,
            'can_reply' => true,
            'is_enabled' => true
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals(1, $item->getUserChatId());
        $this->assertEquals(1682343643, $item->getDate());
        $this->assertTrue($item->getCanReply());
        $this->assertTrue($item->getIsEnabled());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals(1, $item->getUserChatId());
        $this->assertEquals(1682343643, $item->getDate());
        $this->assertTrue($item->getCanReply());
        $this->assertTrue($item->getIsEnabled());
    }
}
