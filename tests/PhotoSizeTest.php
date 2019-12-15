<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PhotoSize;

class PhotoSizeTest extends TestCase
{
    public function testSetFileId()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $photoSize);
    }

    public function testGetFileId()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileId('testfileId');
        $this->assertEquals('testfileId', $photoSize->getFileId());
    }

    public function testSetWidth()
    {
        $photoSize = new PhotoSize();
        $photoSize->setWidth(1);
        $this->assertAttributeEquals(1, 'width', $photoSize);
    }

    public function testGetWidth()
    {
        $photoSize = new PhotoSize();
        $photoSize->setWidth(2);
        $this->assertEquals(2, $photoSize->getWidth());
    }

    public function testSetHeight()
    {
        $photoSize = new PhotoSize();
        $photoSize->setHeight(3);
        $this->assertAttributeEquals(3, 'height', $photoSize);
    }

    public function testGetHeight()
    {
        $photoSize = new PhotoSize();
        $photoSize->setHeight(4);
        $this->assertEquals(4, $photoSize->getHeight());
    }

    public function testSetFileSize()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $photoSize);
    }

    public function testGetFileSize()
    {
        $photoSize = new PhotoSize();
        $photoSize->setFileSize(6);
        $this->assertEquals(6, $photoSize->getFileSize());
    }

    public function testFromResponse()
    {
        $photoSize = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $photoSize);
        $this->assertAttributeEquals('testFileId1', 'fileId', $photoSize);
        $this->assertAttributeEquals(1, 'width', $photoSize);
        $this->assertAttributeEquals(2, 'height', $photoSize);
        $this->assertAttributeEquals(3, 'fileSize', $photoSize);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new PhotoSize();
        $item->setFileSize('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetHeightException()
    {
        $item = new PhotoSize();
        $item->setHeight('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetWidthException()
    {
        $item = new PhotoSize();
        $item->setWidth('s');
    }
}
