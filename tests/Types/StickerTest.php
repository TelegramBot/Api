<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Sticker;

class StickerTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Sticker::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'type' => 'regular',
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'type' => 'regular',
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
            'file_size' => 3,
            'premium_animation' => FileTest::getMinResponse(),
            'emoji' => '🎉',
            'thumb' => PhotoSizeTest::getMinResponse(),
            'set_name' => 'set',
            'custom_emoji_id' => 'custom_emoji_id',
            'mask_position' => MaskPositionTest::getMinResponse(),
        ];
    }

    /**
     * @param Sticker $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals('regular', $item->getType());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(false, $item->getIsAnimated());
        $this->assertEquals(false, $item->getIsVideo());
    }

    /**
     * @param Sticker $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals('regular', $item->getType());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals(false, $item->getIsAnimated());
        $this->assertEquals(FileTest::createMinInstance(), $item->getPremiumAnimation());
        $this->assertEquals(false, $item->getIsVideo());
        $this->assertEquals('🎉', $item->getEmoji());
        $this->assertEquals('set', $item->getSetName());
        $this->assertEquals('custom_emoji_id', $item->getCustomEmojiId());
        $this->assertEquals(MaskPositionTest::createMinInstance(), $item->getMaskPosition());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumb());
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Sticker();
        $item->setFileSize('s');
    }

    public function testSetHeightException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Sticker();
        $item->setHeight('s');
    }

    public function testSetWidthException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Sticker();
        $item->setWidth('s');
    }
}
