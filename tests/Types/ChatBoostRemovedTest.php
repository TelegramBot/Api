<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatBoostRemoved;

class ChatBoostRemovedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatBoostRemoved::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost_id' => 1,
            'remove_date' => 1682343643,
            'source' => ChatBoostSourceTest::getMinResponse()
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost_id' => 1,
            'remove_date' => 1682343643,
            'source' => ChatBoostSourceTest::getMinResponse()
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getRemoveDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getRemoveDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }
}
