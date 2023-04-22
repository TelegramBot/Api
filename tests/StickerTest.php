<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Sticker;
use PHPUnit\Framework\TestCase;

class StickerTest extends TestCase
{
    public function testSetFileId()
    {
        $sticker = new Sticker();
        $sticker->setFileId('testfileId');
        $this->assertEquals('testfileId', $sticker->getFileId());
    }

    public function testSetWidth()
    {
        $sticker = new Sticker();
        $sticker->setWidth(2);
        $this->assertEquals(2, $sticker->getWidth());
    }

    public function testSetHeight()
    {
        $sticker = new Sticker();
        $sticker->setHeight(4);
        $this->assertEquals(4, $sticker->getHeight());
    }

    public function testSetFileSize()
    {
        $sticker = new Sticker();
        $sticker->setFileSize(6);
        $this->assertEquals(6, $sticker->getFileSize());
    }

    public function testSetThumb()
    {
        $sticker = new Sticker();
        $thumb = PhotoSize::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ]);
        $sticker->setThumb($thumb);
        $this->assertEquals($thumb, $sticker->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $sticker->getThumb());
    }

    public function testFromResponse()
    {
        $sticker = Sticker::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
            'is_animated' => false,
            'is_video' => false,
            'type' => 'regular',
            'thumb' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 1,
                'height' => 2,
                'file_size' => 3
            ]
        ]);
        $thumb = PhotoSize::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ]);
        $this->assertInstanceOf(Sticker::class, $sticker);
        $this->assertEquals('testFileId1', $sticker->getFileId());
        $this->assertEquals('testFileUniqueId1', $sticker->getFileUniqueId());
        $this->assertEquals(1, $sticker->getWidth());
        $this->assertEquals(2, $sticker->getHeight());
        $this->assertEquals(3, $sticker->getFileSize());
        $this->assertEquals($thumb, $sticker->getThumb());
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
