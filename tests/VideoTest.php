<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Video;

class VideoTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Video();
        $item->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $item);
    }

    public function testGetFileId()
    {
        $item = new Video();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new Video();
        $item->setDuration(1);
        $this->assertAttributeEquals(1, 'duration', $item);
    }

    public function testGetDuration()
    {
        $item = new Video();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = new Video();
        $item->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $item);
    }

    public function testGetFileSize()
    {
        $item = new Video();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Video();
        $item->setMimeType('video/mp4');
        $this->assertAttributeEquals('video/mp4', 'mimeType', $item);
    }

    public function testGetMimeType()
    {
        $item = new Video();
        $item->setMimeType('video/mp4');
        $this->assertEquals('video/mp4', $item->getMimeType());
    }

    public function testSetThumb()
    {
        $item = new Video();
        $thumb = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $item->setThumb($thumb);
        $this->assertAttributeEquals($thumb, 'thumb', $item);
    }

    public function testGetThumb()
    {
        $item = new Video();
        $thumb = PhotoSize::fromResponse(array(
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $item->setThumb($thumb);
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $item->getThumb());
    }

    public function testSetWidth()
    {
        $item = new Video();
        $item->setWidth(1);
        $this->assertAttributeEquals(1, 'width', $item);
    }

    public function testGetWidth()
    {
        $item = new Video();
        $item->setWidth(2);
        $this->assertEquals(2, $item->getWidth());
    }

    public function testSetHeight()
    {
        $item = new Video();
        $item->setHeight(3);
        $this->assertAttributeEquals(3, 'height', $item);
    }

    public function testGetHeight()
    {
        $item = new Video();
        $item->setHeight(4);
        $this->assertEquals(4, $item->getHeight());
    }

    public function testFromResponse()
    {
        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $thumb = PhotoSize::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 5,
            'height' => 6,
            'file_size' => 7
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\Video', $item);
        $this->assertAttributeEquals('testFileId1', 'fileId', $item);
        $this->assertAttributeEquals(1, 'width', $item);
        $this->assertAttributeEquals(2, 'height', $item);
        $this->assertAttributeEquals(3, 'duration', $item);
        $this->assertAttributeEquals('video/mp4', 'mimeType', $item);
        $this->assertAttributeEquals(4, 'fileSize', $item);
        $this->assertAttributeEquals($thumb, 'thumb', $item);
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $item->getThumb());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetHeightException()
    {
        $item = new Video();
        $item->setHeight('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetWidthException()
    {
        $item = new Video();
        $item->setWidth('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetDurationException()
    {
        $item = new Video();
        $item->setDuration('s');
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new Video();
        $item->setFileSize('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException1()
    {
        $item = Video::fromResponse(array(
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException2()
    {
        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException3()
    {
        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException4()
    {
        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }
}
