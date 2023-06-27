<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatLocation;

class ChatLocationTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatLocation::class;
    }

    public static function getMinResponse()
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'address' => 'Wall St. 123'
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ChatLocation $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('Wall St. 123', $item->getAddress());
    }

    /**
     * @param ChatLocation $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
