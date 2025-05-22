<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\OwnedGifts;

class OwnedGiftsTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return OwnedGifts::class;
    }

    public static function getMinResponse()
    {
        return [
            'total_count' => 1,
            'gifts' => [OwnedGiftRegularTest::getMinResponse()],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'total_count' => 2,
            'gifts' => [OwnedGiftRegularTest::getMinResponse()],
            'next_offset' => '1',
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getTotalCount());
        $this->assertEquals([OwnedGiftRegularTest::createMinInstance()], $item->getGifts());
        $this->assertNull($item->getNextOffset());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(2, $item->getTotalCount());
        $this->assertEquals([OwnedGiftRegularTest::createMinInstance()], $item->getGifts());
        $this->assertEquals('1', $item->getNextOffset());
    }
}
