<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGiftModel;

class UniqueGiftModelTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGiftModel::class;
    }

    public static function getMinResponse()
    {
        return [
            'name' => 'model',
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
        $this->assertEquals('model', $item->getName());
        $this->assertEquals(StickerTest::createMinInstance(), $item->getSticker());
        $this->assertEquals(1, $item->getRarityPerMille());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
