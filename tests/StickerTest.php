<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Sticker;

class StickerTest extends \PHPUnit_Framework_TestCase {
    public function testSetFileId()
    {
        $sticker = new Sticker();
        $sticker->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $sticker);
    }

    public function testGetFileId()
    {
        $sticker = new Sticker();
        $sticker->setFileId('testfileId');
        $this->assertEquals('testfileId', $sticker->getFileId());
    }

    public function testSetWidth()
    {
        $sticker = new Sticker();
        $sticker->setWidth(1);
        $this->assertAttributeEquals(1, 'width', $sticker);
    }

    public function testGetWidth()
    {
        $sticker = new Sticker();
        $sticker->setWidth(2);
        $this->assertEquals(2, $sticker->getWidth());
    }

    public function testSetHeight()
    {
        $sticker = new Sticker();
        $sticker->setHeight(3);
        $this->assertAttributeEquals(3, 'height', $sticker);
    }

    public function testGetHeight()
    {
        $sticker = new Sticker();
        $sticker->setHeight(4);
        $this->assertEquals(4, $sticker->getHeight());
    }

    public function testSetFileSize()
    {
        $sticker = new Sticker();
        $sticker->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $sticker);
    }

    public function testGetFileSize()
    {
        $sticker = new Sticker();
        $sticker->setFileSize(6);
        $this->assertEquals(6, $sticker->getFileSize());
    }

    public function testSetThumb()
    {
        $sticker = new Sticker();
        $thumb = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $sticker->setThumb($thumb);
        $this->assertAttributeEquals($thumb, 'thumb', $sticker);
    }

    public function testGetThumb()
    {
        $sticker = new Sticker();
        $thumb = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $sticker->setThumb($thumb);
        $this->assertEquals($thumb, $sticker->getThumb());
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $sticker->getThumb());
    }

    public function testFromResponse()
    {
        $sticker = Sticker::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
            'is_animated' => false,
            'is_video' => false,
            'type' => 'regular',
            'thumb' => array(
                "file_id" => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 1,
                'height' => 2,
                'file_size' => 3
            )
        ));
        $thumb = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\Sticker', $sticker);
        $this->assertAttributeEquals('testFileId1', 'fileId', $sticker);
        $this->assertAttributeEquals('testFileUniqueId1', 'fileUniqueId', $sticker);
        $this->assertAttributeEquals(1, 'width', $sticker);
        $this->assertAttributeEquals(2, 'height', $sticker);
        $this->assertAttributeEquals(3, 'fileSize', $sticker);
        $this->assertAttributeEquals($thumb, 'thumb', $sticker);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new Sticker();
        $item->setFileSize('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetHeightException()
    {
        $item = new Sticker();
        $item->setHeight('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetWidthException()
    {
        $item = new Sticker();
        $item->setWidth('s');
    }
}
