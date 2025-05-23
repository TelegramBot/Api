<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGift;

class UniqueGiftTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGift::class;
    }

    public static function getMinResponse()
    {
        return [
            'base_name' => 'gift',
            'name' => 'unique1',
            'number' => 1,
            'model' => UniqueGiftModelTest::getMinResponse(),
            'symbol' => UniqueGiftSymbolTest::getMinResponse(),
            'backdrop' => UniqueGiftBackdropTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('gift', $item->getBaseName());
        $this->assertEquals('unique1', $item->getName());
        $this->assertEquals(1, $item->getNumber());
        $this->assertEquals(UniqueGiftModelTest::createMinInstance(), $item->getModel());
        $this->assertEquals(UniqueGiftSymbolTest::createMinInstance(), $item->getSymbol());
        $this->assertEquals(UniqueGiftBackdropTest::createMinInstance(), $item->getBackdrop());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
