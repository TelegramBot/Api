<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\PhotoSize;
use PHPUnit\Framework\TestCase;

class PhotoSizeTest extends TestCase
{
    public function testSetFileId()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileId('testfileId');
        $this->assertEquals('testfileId', $photoSize->getFileId());
    }

    public function testSetWidth()
    {
        $photoSize = new PhotoSize();
        $photoSize->setWidth(2);
        $this->assertEquals(2, $photoSize->getWidth());
    }

    public function testSetHeight()
    {
        $photoSize = new PhotoSize();
        $photoSize->setHeight(4);
        $this->assertEquals(4, $photoSize->getHeight());
    }

    public function testSetFileSize()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileSize(6);
        $this->assertEquals(6, $photoSize->getFileSize());
    }

    public function testFromResponse()
    {
        $photoSize = PhotoSize::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ]);
        $this->assertInstanceOf(PhotoSize::class, $photoSize);
        $this->assertEquals('testFileId1', $photoSize->getFileId());
        $this->assertEquals('testFileUniqueId1', $photoSize->getFileUniqueId());
        $this->assertEquals(1, $photoSize->getWidth());
        $this->assertEquals(2, $photoSize->getHeight());
        $this->assertEquals(3, $photoSize->getFileSize());
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setFileSize('s');
    }

    public function testSetHeightException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setHeight('s');
    }

    public function testSetWidthException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setWidth('s');
    }
}
