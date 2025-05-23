<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Gifts;

class GiftsTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Gifts::class;
    }

    public static function getMinResponse()
    {
        return [
            'gifts' => [
                GiftTest::getMinResponse(),
            ],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'gifts' => [
                GiftTest::getFullResponse(),
            ],
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertIsArray($item->getGifts());
        $this->assertEquals([GiftTest::createMinInstance()], $item->getGifts());
    }

    protected function assertFullItem($item)
    {
        $this->assertIsArray($item->getGifts());
        $this->assertEquals([GiftTest::createFullInstance()], $item->getGifts());
    }
}
