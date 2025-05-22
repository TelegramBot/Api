<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\OwnedGiftRegular;

class OwnedGiftRegularTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return OwnedGiftRegular::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'regular',
            'gift' => GiftTest::getMinResponse(),
            'send_date' => 1682343643,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'type' => 'regular',
            'gift' => GiftTest::getMinResponse(),
            'owned_gift_id' => 'id',
            'sender_user' => UserTest::getMinResponse(),
            'send_date' => 1682343643,
            'text' => 'hi',
            'entities' => [MessageEntityTest::getMinResponse()],
            'is_private' => true,
            'is_saved' => true,
            'can_be_upgraded' => true,
            'was_refunded' => true,
            'convert_star_count' => 1,
            'prepaid_upgrade_star_count' => 2,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('regular', $item->getType());
        $this->assertEquals(GiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals(1682343643, $item->getSendDate());
        $this->assertNull($item->getOwnedGiftId());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('regular', $item->getType());
        $this->assertEquals(GiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals('id', $item->getOwnedGiftId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getSenderUser());
        $this->assertEquals(1682343643, $item->getSendDate());
        $this->assertEquals('hi', $item->getText());
        $this->assertEquals([MessageEntityTest::createMinInstance()], $item->getEntities());
        $this->assertTrue($item->getIsPrivate());
        $this->assertTrue($item->getIsSaved());
        $this->assertTrue($item->getCanBeUpgraded());
        $this->assertTrue($item->getWasRefunded());
        $this->assertEquals(1, $item->getConvertStarCount());
        $this->assertEquals(2, $item->getPrepaidUpgradeStarCount());
    }
}
