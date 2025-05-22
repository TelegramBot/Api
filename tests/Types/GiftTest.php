<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Gift;

class GiftTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Gift::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 'gift1',
            'sticker' => StickerTest::getMinResponse(),
            'star_count' => 10,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 'gift1',
            'sticker' => StickerTest::getMinResponse(),
            'star_count' => 10,
            'upgrade_star_count' => 5,
            'total_count' => 100,
            'remaining_count' => 50,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('gift1', $item->getId());
        $this->assertEquals(StickerTest::createMinInstance(), $item->getSticker());
        $this->assertEquals(10, $item->getStarCount());
        $this->assertNull($item->getUpgradeStarCount());
        $this->assertNull($item->getTotalCount());
        $this->assertNull($item->getRemainingCount());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('gift1', $item->getId());
        $this->assertEquals(StickerTest::createMinInstance(), $item->getSticker());
        $this->assertEquals(10, $item->getStarCount());
        $this->assertEquals(5, $item->getUpgradeStarCount());
        $this->assertEquals(100, $item->getTotalCount());
        $this->assertEquals(50, $item->getRemainingCount());
    }
}
