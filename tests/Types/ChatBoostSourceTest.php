<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatBoostSource;

class ChatBoostSourceTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatBoostSource::class;
    }

    public static function getMinResponse()
    {
        return [
            'source' => 'premium',
            'user' => UserTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return [
            'source' => 'premium',
            'user' => UserTest::getMinResponse(),
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('premium', $item->getSource());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('premium', $item->getSource());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
    }
}
