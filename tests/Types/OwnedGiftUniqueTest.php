<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\OwnedGiftUnique;

class OwnedGiftUniqueTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return OwnedGiftUnique::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'unique',
            'gift' => UniqueGiftTest::getMinResponse(),
            'send_date' => 1682343643,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'type' => 'unique',
            'gift' => UniqueGiftTest::getMinResponse(),
            'owned_gift_id' => 'id',
            'sender_user' => UserTest::getMinResponse(),
            'send_date' => 1682343643,
            'is_saved' => true,
            'can_be_transferred' => true,
            'transfer_star_count' => 3,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('unique', $item->getType());
        $this->assertEquals(UniqueGiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals(1682343643, $item->getSendDate());
        $this->assertNull($item->getOwnedGiftId());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('unique', $item->getType());
        $this->assertEquals(UniqueGiftTest::createMinInstance(), $item->getGift());
        $this->assertEquals('id', $item->getOwnedGiftId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getSenderUser());
        $this->assertEquals(1682343643, $item->getSendDate());
        $this->assertTrue($item->getIsSaved());
        $this->assertTrue($item->getCanBeTransferred());
        $this->assertEquals(3, $item->getTransferStarCount());
    }
}
