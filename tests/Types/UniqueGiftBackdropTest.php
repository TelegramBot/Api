<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGiftBackdrop;

class UniqueGiftBackdropTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGiftBackdrop::class;
    }

    public static function getMinResponse()
    {
        return [
            'name' => 'backdrop',
            'colors' => UniqueGiftBackdropColorsTest::getMinResponse(),
            'rarity_per_mille' => 1,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('backdrop', $item->getName());
        $this->assertEquals(UniqueGiftBackdropColorsTest::createMinInstance(), $item->getColors());
        $this->assertEquals(1, $item->getRarityPerMille());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
