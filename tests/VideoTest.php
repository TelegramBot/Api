<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Video();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new Video();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = new Video();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
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
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ));
        $item->setThumb($thumb);
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $item->getThumb());
    }

    public function testSetWidth()
    {
        $item = new Video();
        $item->setWidth(2);
        $this->assertEquals(2, $item->getWidth());
    }

    public function testSetHeight()
    {
        $item = new Video();
        $item->setHeight(4);
        $this->assertEquals(4, $item->getHeight());
    }

    public function testFromResponse()
    {
        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $thumb = PhotoSize::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 5,
            'height' => 6,
            'file_size' => 7
        ));
        $this->assertInstanceOf(Video::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getDuration());
        $this->assertEquals('video/mp4', $item->getMimeType());
        $this->assertEquals(4, $item->getFileSize());
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $item->getThumb());
    }

    public function testSetHeightException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setHeight('s');
    }

    public function testSetWidthException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setWidth('s');
    }

    public function testSetDurationException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setFileSize('s');
    }

    /**
     * file_id is required
     */
    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Video::fromResponse(array(
            'file_unique_id' => 'testFileUniqueId1',
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
     * width is required
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }

    /**
     * height is required
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }

    /**
     * duration is required
     */
    public function testFromResponseException4()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }

    /**
     * file_unique_id is required
     */
    public function testFromResponseException5()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 1,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
    }
}
