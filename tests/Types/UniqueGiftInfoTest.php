<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGiftInfo;

class UniqueGiftInfoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGiftInfo::class;
    }

    public static function getMinResponse()
    {
        return [
            'gift' => UniqueGiftTest::getMinResponse(),
            'origin' => 'upgrade',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'gift' => UniqueGiftTest::getMinResponse(),
            'origin' => 'upgrade',
            'owned_gift_id' => 'id',
            'transfer_star_count' => 3,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(UniqueGiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals('upgrade', $item->getOrigin());
        $this->assertNull($item->getOwnedGiftId());
        $this->assertNull($item->getTransferStarCount());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(UniqueGiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals('upgrade', $item->getOrigin());
        $this->assertEquals('id', $item->getOwnedGiftId());
        $this->assertEquals(3, $item->getTransferStarCount());
    }
}
