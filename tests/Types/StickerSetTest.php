<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\StickerSet;

class StickerSetTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return StickerSet::class;
    }

    public static function getMinResponse()
    {
        return [
            'name' => 'name',
            'title' => 'title',
            'sticker_type' => 'regular',
            'is_animated' => true,
            'is_video' => true,
            'stickers' => [
                StickerTest::getMinResponse(),
            ],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'name' => 'name',
            'title' => 'title',
            'sticker_type' => 'regular',
            'is_animated' => true,
            'is_video' => true,
            'stickers' => [
                StickerTest::getMinResponse(),
            ],
            'thumbnail' => PhotoSizeTest::getMinResponse(),
        ];
    }

    /**
     * @param StickerSet $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('regular', $item->getStickerType());
        $this->assertEquals(true, $item->getIsAnimated());
        $this->assertEquals(true, $item->getIsVideo());
        $this->assertEquals([StickerTest::createMinInstance()], $item->getStickers());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param StickerSet $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('regular', $item->getStickerType());
        $this->assertEquals(true, $item->getIsAnimated());
        $this->assertEquals(true, $item->getIsVideo());
        $this->assertEquals([StickerTest::createMinInstance()], $item->getStickers());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
