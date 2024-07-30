<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatBoostUpdated;

class ChatBoostUpdatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatBoostUpdated::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost' => ChatBoostTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost' => ChatBoostTest::getMinResponse(),
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(ChatBoostTest::createMinInstance(), $item->getBoost());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(ChatBoostTest::createMinInstance(), $item->getBoost());
    }
}
