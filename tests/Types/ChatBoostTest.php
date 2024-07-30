<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\ChatBoost;
use TelegramBot\Api\Test\AbstractTypeTest;

class ChatBoostTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatBoost::class;
    }

    public static function getMinResponse()
    {
        return [
            'boost_id' => 1,
            'add_date' => 1682343643,
            'expiration_date' => 1725042370,
            'source' => ChatBoostSourceTest::getMinResponse()
        ];
    }

    public static function getFullResponse()
    {
        return [
            'boost_id' => 1,
            'add_date' => 1682343643,
            'expiration_date' => 1725042370,
            'source' => ChatBoostSourceTest::getMinResponse()
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getAddDate());
        $this->assertEquals(1725042370, $item->getExpirationDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getAddDate());
        $this->assertEquals(1725042370, $item->getExpirationDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }
}
