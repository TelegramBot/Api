<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\GiftInfo;

class GiftInfoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return GiftInfo::class;
    }

    public static function getMinResponse()
    {
        return [
            'gift' => GiftTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return [
            'gift' => GiftTest::getMinResponse(),
            'owned_gift_id' => 'id',
            'convert_star_count' => 1,
            'prepaid_upgrade_star_count' => 2,
            'can_be_upgraded' => true,
            'text' => 'hi',
            'entities' => [MessageEntityTest::getMinResponse()],
            'is_private' => true,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(GiftTest::createMinInstance(), $item->getGift());
        $this->assertNull($item->getOwnedGiftId());
        $this->assertNull($item->getConvertStarCount());
        $this->assertNull($item->getPrepaidUpgradeStarCount());
        $this->assertNull($item->getCanBeUpgraded());
        $this->assertNull($item->getText());
        $this->assertNull($item->getEntities());
        $this->assertNull($item->getIsPrivate());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(GiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals('id', $item->getOwnedGiftId());
        $this->assertEquals(1, $item->getConvertStarCount());
        $this->assertEquals(2, $item->getPrepaidUpgradeStarCount());
        $this->assertTrue($item->getCanBeUpgraded());
        $this->assertEquals('hi', $item->getText());
        $this->assertEquals([MessageEntityTest::createMinInstance()], $item->getEntities());
        $this->assertTrue($item->getIsPrivate());
    }
}
