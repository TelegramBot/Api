<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGiftSymbol;

class UniqueGiftSymbolTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGiftSymbol::class;
    }

    public static function getMinResponse()
    {
        return [
            'name' => 'symbol',
            'sticker' => StickerTest::getMinResponse(),
            'rarity_per_mille' => 1,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('symbol', $item->getName());
        $this->assertEquals(StickerTest::createMinInstance(), $item->getSticker());
        $this->assertEquals(1, $item->getRarityPerMille());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
