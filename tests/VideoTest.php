<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Video;

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
        $item->setFileSize(5);
        $this->assertEquals(5, $item->getFileSize());
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
        $thumb = PhotoSize::fromResponse([
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ]);
        $item->setThumb($thumb);
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $item->getThumb());
    }

    public function testSetWidth()
    {
        $item = new Video();
        $item->setWidth(1);
        $this->assertEquals(1, $item->getWidth());
    }

    public function testSetHeight()
    {
        $item = new Video();
        $item->setHeight(3);
        $this->assertEquals(3, $item->getHeight());
    }

    public function testFromResponse()
    {
        $item = Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
        $thumb = PhotoSize::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 5,
            'height' => 6,
            'file_size' => 7
        ]);
        $this->assertInstanceOf(Video::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
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
        $this->expectException(\TypeError::class);
        $item = new Video();
        $item->setHeight('s');
    }


    public function testSetWidthException()
    {
        $this->expectException(\TypeError::class);
        $item = new Video();
        $item->setWidth('s');
    }

    public function testSetDurationException()
    {
        $this->expectException(\TypeError::class);
        $item = new Video();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(\TypeError::class);
        $item = new Video();
        $item->setFileSize('s');
    }

    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Video::fromResponse([
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Video::fromResponse([
            'file_id' => 'testFileId1',
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    public function testFromResponseException4()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }
}
